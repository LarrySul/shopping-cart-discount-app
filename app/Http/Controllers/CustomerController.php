<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        foreach($request->customers as $data){
            Customer::create([
                'id' => $data['id'],
                'name' => $data['name'],
                'since' => $data['since'],
                'revenue' => $data['revenue']
            ]);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Successful',
            'data' => []
        ]);
    }
}
