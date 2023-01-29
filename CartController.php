<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function index()
    {
    $ids = Session::get('ids', []);
    $products = Product::whereIn('id', $ids)->get();
    $quantity = array_count_values(session()->get('ids',[]));
    $subTotal = Cart::subTotal($products,$quantity);
    $shipping = Cart::shipping($products,$quantity);
    $total = $shipping + $subTotal;
    return view('cart')->with([
        'products'=>$products,
        'quantity'=>$quantity,
        'subTotal'=>$subTotal,
        'shipping'=>$shipping,
        'total'=>$total
    ]);
    }
    function incQuantity(Request $request){
        $ids = Session::get('ids', []);
        array_push($ids, $request->get('id'));
        Session::put('ids', $ids);
        return response()->json($ids);
    }

    function decQuantity(Request $request){
        $ids = Session::get('ids', []);
        $i = array_search($request->get('id'), $ids);
        array_splice($ids,$i,1);
        Session::put('ids', $ids);
        return response()->json($ids);
    }

    function deleteProduct(Request $request){
        $ids = Session::get('ids', []);
        $newIds = [];
        foreach($ids as $id){
            if ($id != $request->get('id')){
                array_push($newIds, $id);
            }
        }
        Session::put('ids', $newIds);
        return response()->json($newIds);
    }

}
