<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // return $cartItems;
        return view('cart.list', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }


    public function storeOrderFromCart()
    {
        // Mengambil isi keranjang
        $cartItems = \Cart::getContent();

        // Mengambil data user
        $user = Auth::user();

        // Menyimpan data ke tabel order dari keranjang
        foreach ($cartItems as $items => $value) {
            $order = new Order;
            $order->user_id = $user->id;
            $order->product_id = $value->id;
            $order->date = date('Y-m-d');
            $order->quantity = $value->quantity;
            $order->price = $value->price;
            $order->total = $value->price * $value->quantity;
            $order->save();
        };

        // Mengirimkan pesan berhasil dan jumlah pembayaran
        session()->flash('successOrder', \Cart::getTotal());

        // clear cart
        \Cart::clear();

        return redirect()->route('cart.list');
    }
}
