<?php

namespace App\Http\Controllers;

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

    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request, string $id_vinyl)
    {
        $quantity = $request->validate(['quantity' => 'required']);

        $result = Cart_vinyls::create([
            'id_user' => Auth::id(),
            'id_vinyl' => $id_vinyl,
            'quantity' => $quantity['quantity']
        ]);
        return back()->with('addToCart', 'In cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart_vinyls $cart_vinyls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart_vinyls $cart_vinyls)
    {
        //
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
