<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\DiscountService;


class OrderController extends Controller
{
    protected $discountService;
    
    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $request = collect($request)->toArray(); 
       $customer = Customer::find($request['customer-id']);
       $product = Product::select('id', 'category')->whereIn('category',[1, 2])->get();
       if($customer){
            $item_total_discount = 0;
            $item_total_discount = $this->discountService
                                    ->applyTenPercentDiscountOnOverAThousandRevenue($customer->revenue, $request['total']);
            
            $product_switch_ids = collect($product)->where('category', 2);
            $item_total_discount += $this->discountService
                                    ->applyDiscountOnSwitchCategory($request['items'], $product_switch_ids);

            
            $product_tool_ids = collect($product)->where('category', 1);
            $item_total_discount += $this->discountService
                                    ->applyDiscountOnTwoOrMoreToolsCategory($request['items'], $product_tool_ids);

            $final_total = $request['total'] - $item_total_discount;
        
            $order_array = [
                'customer-id' => $request['customer-id'],
                'items' => $request['items'],
                'original_total' => $request['total'],
                'final_total' => $final_total ,
                'total_discount' => $item_total_discount,
            ];

            Order::create($order_array);
            
            // update customer revenue spend limit
            $revenue = $customer->revenue + $final_total;
            $customer_update = $customer->update(['revenue' => $revenue]);

            return response()->json([
                'status' => 201,
                'message' => 'Order created successfully',
                'data' => $order_array
            ]);
        }
    }
}
