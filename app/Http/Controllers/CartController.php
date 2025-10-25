<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $sessionId = (string) Auth::id();
        $items = Cart::session($sessionId)->getContent();
        $total = Cart::session($sessionId)->getTotal();

        return view('carts.index', compact('items', 'total'));
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $qty = (int) $request->input('qty', 1);
        $sessionId = (string) Auth::id();

        Cart::session($sessionId)->add([
            'id' => (string) $product->id,
            'name' => $product->name,
            'price' => (int) $product->price,
            'quantity' => $qty,
            'attributes' => [
                'image' => $product->image,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Added to cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $sessionId = (string) Auth::id();

        Cart::session($sessionId)->update($id, [
            'quantity' => [
                'relative' => false,
                'value' => (int) $request->quantity,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function remove(Request $request, $id)
    {
        $sessionId = (string) Auth::id();
        Cart::session($sessionId)->remove($id);

        return redirect()->route('cart.index')->with('success', 'Item removed.');
    }

    public function checkout()
    {
        $userId = Auth::id();
        $sessionId = (string) $userId;
        $items = Cart::session($sessionId)->getContent();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = Cart::session($sessionId)->getTotal();

        return view('checkout.index', compact('items', 'total'));
    }
}
