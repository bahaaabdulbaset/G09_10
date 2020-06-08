<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsAPIController extends Controller
{
    public function getProductDetails(Request $request, $pID)
    {

        $product = \App\Product::where('id', '=', $pID)->with('image')->first();
        if ($product) {
            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => $product,
            ];
            return response()->json($reply);
        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Product is not found!'],
                'data' => null,
            ];
            return response()->json($reply);
        }

    }
}
