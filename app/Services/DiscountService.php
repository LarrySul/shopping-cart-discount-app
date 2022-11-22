<?php

namespace App\Services;

class DiscountService
{
	public function applyDiscountOnOverAThousandEuroRevenue(float $customer_revenue, float $total_price_order) :float
	{	
		$total_discount = 0;
		if($customer_revenue > 1000){
            $total_discount = 0.1 * $total_price_order;
        }

        return $total_discount;
	}


	public function applyDiscountOnSwitchCategory(array $order_items, array $product_ids): float
	{
		$total_discount = 0;
		foreach($order_items as $item){
	        $quantity = 0; 
			$counter = 0;
	        if(in_array($item['product-id'], $product_ids)){
	            $quantity += $item['quantity'];
	            $counter = floor($quantity / 6);
	            if ($counter >= 1) {
                    
	                $discount = $counter * $item['unit-price'];
	            }
	                
	            $total_discount += $discount;
	        }
	    }

	    return $total_discount;
	}	

	public function applyDiscountOnTwoOrMoreToolsCategory(array $order_items, array $product_ids): float
	{
		
        $counter = 0;
        $total_discount = 0;
        $priceList = [];
        foreach($order_items as $key => $item){
            if(in_array($item['product-id'], $product_ids)){
                $counter = $key+1;
                $priceList[] = $item['total'];
            }
        }

        if($counter >= 2){
            $discount = 0.2 * min($priceList);
            $total_discount = $discount;
        }

        return $total_discount;
	}
}