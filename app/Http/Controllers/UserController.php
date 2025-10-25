<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->postal_code = $request->postal_code ?? $user->postal_code;
        $user->address = $request->address ?? $user->address;
        $user->phone = $request->phone ?? $user->phone;

        $user->save();

        return to_route('mypage')->with('flash_message', 'Your account information has been updated.');
    }


    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        } else {
            return to_route('mypage.edit_password');
        }

        return to_route('mypage')->with('flash_message', 'Your password has been successfully changed.');
    }

    public function edit_password()
    {
        return view('users.edit_password');
    }

    public function favorite()
    {
        $user = Auth::user();

        $favorite_products = $user->favorite_products;

        return view('users.favorite', compact('favorite_products'));
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.order_history', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        abort_unless($order->user_id === Auth::user()->id, 403);

        $order->load('items.product');

        return view('users.order_detail', compact('order'));
    }
}
