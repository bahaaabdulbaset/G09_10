<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function getHomeView() {
        $sliderData = \App\Slider::orderBy('created_at', 'DESC')->take(10)->get();
        $cats = \App\Category::orderBy('created_at', 'ASC')->take(10)->get();
        $newProducts = \App\Product::orderBy('created_at', 'DESC')->take(12)->get();
        $topSales = \App\OrderDetail::groupBy('product_id')
            ->select('product_id', \DB::raw('COUNT(*) AS K'))
            ->orderBy('K', 'DESC')
            ->take(12)
            ->pluck('product_id')
            ->toArray();
        $sales = \App\Product::find($topSales);
        return view('home', [
            'sliders' => $sliderData,
            'cats' => $cats,
            'arrivals' => $newProducts,
            'sales' => $sales,
        ]);
    }

    public function addToCart(Request $request) {
        if (!\Auth::check()) {
            return redirect('/login');
        }

        $rules = ['product' => 'required'];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/home');
        }

        $productID = $request->get('product');
        $product = \App\Product::find($productID);
        if (!$product) {
            return redirect('/home');
        }


        $lastOrder = \App\Order::where('is_checked_out', '=', false)
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {

            $orderProduct = \App\OrderDetail::where('order_id', '=', $lastOrder->id)
                ->where('product_id', '=', $product->id)->first();
            if ($orderProduct) {
                $orderProduct->amount = $orderProduct->amount + 1;
                $orderProduct->save();
            } else {
                $newOrderDetails = new \App\OrderDetail();
                $newOrderDetails->order_id = $lastOrder->id;
                $newOrderDetails->product_id = $productID;
                $newOrderDetails->amount = 1;
                $newOrderDetails->price = $product->selling_price;
                $newOrderDetails->discount = $product->discount;
                $newOrderDetails->save();
            }

        } else {
            $newOrder = new \App\Order();
            $newOrder->user_id = \Auth::user()->id;
            $newOrder->first_name = "";
            $newOrder->last_name = "";
            $newOrder->address = "";
            $newOrder->phone_number = "";
            $newOrder->save();

            $newOrderDetails = new \App\OrderDetail();
            $newOrderDetails->order_id = $newOrder->id;
            $newOrderDetails->product_id = $productID;
            $newOrderDetails->amount = 1;
            $newOrderDetails->price = $product->selling_price;
            $newOrderDetails->discount = $product->discount;
            $newOrderDetails->save();
        }

        return redirect('/home');
    }
}
