<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cart\Cart as CartResource;
use App\Http\Resources\Cart\CartCollection;
use App\Models\Cart;
use App\Models\Product;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $user_id = auth('api')->user()->id;
        $cart = Cart::where('user_id', $user_id)->with('product')->get();
        return response()->json([$cart]);
    }

    public function deleteProduct($cart_id)
    {
        $user_id = auth('api')->user()->id;

        $result = Cart::where('user_id', $user_id)->where('id', $cart_id)->first();
        $product_id = $result->product_id;
        $quantity=$result->quantity;

        if (!$result) {
            return response()->json(['message' => 'Unauthorized'], 404);
        } else {
            $deleteProduct = Cart::destroy($cart_id);
            if ($deleteProduct) {
                $product=Product::find($product_id);
                
                $product->update(['quantity'=> $product->quantity + $quantity]);
                return  response()->json(['task' => 'Product deleted'], 200);
            }
           
            
        }
    }

    public function updateCart(Request $request,$cart_id){
        $quantity= $request->input('quantity');
        $user_id = auth('api')->user()->id;

        $result = Cart::where('user_id', $user_id)->where('id', $cart_id)->first();
        $product_id = $result->product_id;
        $present_quantity = $result->quantity;
        // $quantity=$result->quantity;

        if (!$result) {
            return response()->json(['message' => 'Unauthorized'], 404);
        } else {
            $difference = $quantity - $present_quantity;
            if ($difference < 0) {
                $item_qty = abs($difference);
                //increase product quantity and reduct the amount for that product in cart
                $current_product_value = Product::find($product_id);
                $current_product_value->update(['quantity'=> $current_product_value->quantity + $item_qty]);
                //decrease product cart item and amount
                $result->update(['quantity'=> $quantity, 'amount'=> $current_product_value->unit_price * $quantity]);

            }else{
                //decrease product quantity and increase the amount for that product in cart
                $current_product_value = Product::find($product_id);
                $current_product_value->update(['quantity'=> $current_product_value->quantity - $difference]);
                //decrease product cart item and amount
                $result->update(['quantity'=> $quantity, 'amount'=> $current_product_value->unit_price * $quantity]);
            }

            return response()->json(['message' => 'product updated successfully'], 200);


            // $updateProduct = $result->update(['quantity'=>$quantity]);
            // if ($updateProduct) {
            //     $product=Product::find($product_id);
                
            //     $product->update(['quantity'=> $product->quantity + $quantity]);
            //     return  response()->json(['task' => 'Product deleted'], 200);
            // }
           
            
        }
    }
}
