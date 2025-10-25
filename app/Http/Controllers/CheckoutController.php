<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        $sessionId = (string) Auth::id();
        $items = Cart::session($sessionId)->getContent();
        $total = Cart::session($sessionId)->getTotal();

        return view('checkout.index', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $sessionId = (string) Auth::id();
        $cart = Cart::session($sessionId)->getContent();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $item->name],
                    'unit_amount' =>(int) ($item->price * 100),
                ],
                'quantity' =>$item->quantity,
            ];
        }

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.index'),
        ]);

        return redirect($checkoutSession->url);
    }

    public function success()
    {
        $userId = Auth::id();
        $sessionId = (string) $userId;

        $recentOrder = Order::where('user_id', $userId)
            ->where('created_at', '>=', now()->subMinutes(5))
            ->latest()
            ->first();

        if ($recentOrder) {
            $order = $recentOrder;
        } else {
            $cart = Cart::session($sessionId)->getContent();
            $total = Cart::session($sessionId)->getTotal();

            if ($cart->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Cart is empty.');
            }

            $order = Order::create([
                'user_id' => $userId,
                'order_number' => 'ORD' . now()->format('Ymd') . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
                'total' => $total,
                'status' => 'paid',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => (int) $item->id,
                    'quantity' => (int) $item->quantity,
                    'price' => (int) $item->price,
                ]);
            }

            Cart::session($sessionId)->clear();
        }

        return view('checkout.success', compact('order'));
    }
}
