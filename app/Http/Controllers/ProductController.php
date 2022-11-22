<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        foreach($request->products as $data){
            Product::create([
                'id' => $data['id'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price']
            ]);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Successful',
            'data' => []
        ]);
    }
}
