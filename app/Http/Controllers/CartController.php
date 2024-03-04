<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Vinyl;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_vinyls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinyls = Cart_vinyls::getCartVinyls(Auth::id());

        return view('user.cart', [
            'vinyls' => $vinyls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request, Vinyl $vinyl)
    {
        $quantity = $request->validate(['quantity' => 'required']);
        $cart = Cart_vinyls::query()->where('id_vinyl', $vinyl->id)->get()[0];
        if ($cart->update(['quantity' => $cart->quantity + $quantity['quantity']]))
            return back()->with('addToCart', 'In cart');
        $result = Cart_vinyls::create([
            'id_user' => Auth::id(),
            'id_vinyl' => $vinyl->id,
            'quantity' => $quantity['quantity']
        ]);
        return back()->with('addToCart', 'In cart');
    }

    /**
     * Display the specified resource.
     */


    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart_vinyls $cart_vinyls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart_vinyls $cart_vinyls)
    {
        //
    }
}
