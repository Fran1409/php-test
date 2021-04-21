<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fetchProducts() 
    {
        return [
            "1001" => [
                "id" => "1001",
                "name" => "Article 1",
                "price" => "10",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "1"
            ],
            "1002" => [
                "id" => "1002",
                "name" => "Article 2",
                "price" => "20",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1003" => [
                "id" => "1003",
                "name" => "Article 3",
                "price" => "30",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1004" => [
                "id" => "1004",
                "name" => "Article 4",
                "price" => "40",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1005" => [
                "id" => "1005",
                "name" => "Article 5",
                "price" => "50",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1006" => [
                "id" => "1006",
                "name" => "Article 6",
                "price" => "60",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1007" => [
                "id" => "1007",
                "name" => "Article 7",
                "price" => "70",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1008" => [
                "id" => "1008",
                "name" => "Article 8",
                "price" => "80",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1009" => [
                "id" => "1009",
                "name" => "Article 9",
                "price" => "90",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ],
            "1010" => [
                "id" => "1010",
                "name" => "Article 10",
                "price" => "100",
                "btw" => "21%",
                "amount" => "0",
                "discountCode" => "0"
            ], 
        ];
    }
}
