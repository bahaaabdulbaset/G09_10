<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
//        $p = $request->get('p');
//        if (!$p) $p = 1;
//        $skip = ($p - 1) * 12;
//        $products = Product::skip($skip)->take(12)->get();
//        if (count($products) <= 0) {
//            return redirect('/shopping-cart?p=1');
//        }
//        dd($products);

        $lastOrder = \App\Order::where('is_checked_out', '=', false)
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('created_at', 'DESC')->first();

        return view('shopping-cart', [
            'lastOrderDetails' => $lastOrder ? $lastOrder->orderDetails : [],
        ]);
    }

    public function deleteItemFromCart(Request $request)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }

        $rules = ['product' => 'required'];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/shopping-cart');
        }

        $productID = $request->get('product');
        $product = \App\Product::find($productID);
        if (!$product) {
            return redirect('/shopping-cart');
        }

        $lastOrder = \App\Order::where('is_checked_out', '=', false)
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('created_at', 'DESC')->first();

        if ($lastOrder) {
            $productInOrder = \App\OrderDetail::where('product_id', '=', $productID)
                ->where('order_id', '=', $lastOrder->id)->first();

            if ($productInOrder) {
                $productInOrder->delete();
                return redirect('/shopping-cart')
                    ->with(['success' => 'Item is removed from your cart successfully!']);
            } else {
                return redirect('/shopping-cart');
            }
        } else {
            return redirect('/shopping-cart');
        }
    }

    public function cancelOrder(Request $request)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }

        $lastOrder = \App\Order::where('is_checked_out', '=', false)
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('created_at', 'DESC')->first();

        if ($lastOrder) {
            $products = \App\OrderDetail::where('order_id', '=', $lastOrder->id)->get();
            foreach ($products as $product) {
                $product->delete();
            }
            $lastOrder->delete();


            return redirect('/shopping-cart')
                ->with(['success' => 'Order is cancelled successfully!']);
        } else {
            return redirect('/shopping-cart');
        }
    }
}
