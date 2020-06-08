<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesAPIController extends Controller
{
    public function index(Request $request)
    {

        $categories = \App\Category::with('image')->get();

        $reply = [
            'failed' => false,
            'errors' => null,
            'data' => $categories,
        ];
        return response()->json($reply);
    }

    public function getCatProducts(Request $request, $cID)
    {

        $category = \App\Category::find($cID);
        if ($category) {
            $reply = [
                'failed' => false,
                'errors' => null,
                'data' => $category->products()->with('image')->get(),
            ];
            return response()->json($reply);
        } else {
            $reply = [
                'failed' => true,
                'errors' => ['Products are not found in this category!'],
                'data' => null,
            ];
            return response()->json($reply);
        }

    }
}
