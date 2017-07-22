<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Cart;

class CartController extends Controller
{
 
    public function index()
    {
        $carts=Cart::content();
        return view('cart.index')->withCarts($carts);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $product=products::find($id);

        Cart::add($id,$product->name,1,$product->price,['size'=>$product->size]);

        //return back();

        return redirect()->route('cart.index');
    }

    
    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);

        return redirect()->route('cart.index');
    }

    
    public function destroy($id)
    {
        Cart::remove($id);

        return back();
    }
}
