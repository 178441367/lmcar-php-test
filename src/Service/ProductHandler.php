<?php

namespace App\Service;


class ProductHandler
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function GetTotalPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product["price"];
        }
        return $sum;
    }

    public function GetDessertProductBySort()
    {
         usort($this->products,function ($a,$b){
            if ($a["price"]==$b["price"]) return 0;
            return ($a["price"]<$b["price"])?1:-1;
        });
        $this->products= array_filter($this->products,function ($item){
            if($item["type"] == "Dessert")return true;
        });
        return $this->products;
    }
    public function Date2Unix(){
        foreach ($this->products as &$product){
            $product["create_at_unix"] = strtotime($product["create_at"]);
        }
        return $this->products;
    }
}
