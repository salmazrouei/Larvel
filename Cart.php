<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;

class Cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];

    static function subTotal($products,$quantity)
    {
        $subTotal = 0;
        foreach($products as $product){
            $subTotal += $quantity[$product['id']] * $product['price'];
        }
        return $subTotal;
    }

    static function shipping($products,$quantity){
        $amount = 0;
        foreach($products as $product){
            $amount += $quantity[$product['id']];
        }
        $shipping = $amount * 10;
        return $shipping;
    }
}
