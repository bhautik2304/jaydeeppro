<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
class cartfeture extends Controller
{
    //
public function addtocart(Request $req)
{
    # code...
    $cart=new cart;
    $cart->userid=$req->user_id;
    $cart->productid=$req->product_id;
    $cart->price=$req->price;
    $cart->qty=$req->qty;
    $cart->totale_price=$req->totale_price;
    $cart->save();

    $cartdata=[
        "product"=>cart::where("userid",$req->user_id)
                       ->with('menu')
                       ->get(),
        "cart_totale"=>cart::where("userid",$req->user_id)->sum('totale_price'),
    ];

    return  response(["cart_data"=>$cartdata],200);
}

public function emputycart(Request $req)
{
    # code...
    cart::where("userid",$req->userid)->delete();
    return  response(["emputycart"=>true],200);
}
}
