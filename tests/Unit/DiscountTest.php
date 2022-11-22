<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\DiscountService;

class DiscountTest extends TestCase
{
    protected $discount;
    protected $data;

    public function testApplyTenPercentDiscountOnOverAThousandEuroRevenue()
    {
       $data = [
            'customer-revenue' => 1501.44,
            'total' => 235.90
       ];

       $discount = (new DiscountService())
                    ->applyDiscountOnOverAThousandEuroRevenue($data['customer-revenue'], $data['total']);

        $this->assertEquals(23.59, round($discount, 2));
    }

    public function testApplyDiscountOnSixthItemForSwitchCategoryWhenItemExceedFive()
    {
        $order_items = [
            [
              "product-id" => "B102",
              "quantity" => "10",
              "unit-price" => "4.99",
              "total" => "49.90"
            ],
            [
              "product-id" => "B103",
              "quantity" => "12",
              "unit-price" => "9.75",
              "total" => "117.0"
            ]
        ];
        
        $product_ids = ['B101', 'B102', 'B103'];

        $discount = (new DiscountService())
                    ->applyDiscountOnSwitchCategory($order_items, $product_ids);
        
        $this->assertEquals(24.49, round($discount, 2));
    }
    
    public function testApplyTwentyPercentDiscountOnTwoOrMoreProductInToolsCategory()
    {
        $order_items = [
            [
              "product-id" => "A101",
              "quantity" => "2",
              "unit-price" => "9.75",
              "total" => "19.50"
            ],
            [
              "product-id" => "A102",
              "quantity" => "12",
              "unit-price" => "24.75",
              "total" => "49.50"
            ]
        ];

        $product_ids = ['A101', 'A102'];

        $discount = (new DiscountService())
                    ->applyDiscountOnTwoOrMoreToolsCategory($order_items, $product_ids);
        
        $this->assertEquals(3.9, round($discount, 2));
    }
}
