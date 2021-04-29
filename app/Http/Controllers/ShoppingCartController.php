<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function submitForm(Request $request)
    {
        //Validate the input of the form
        request()->validate([
            'email' => 'required|email:rfc,dns',
            'street' => 'required',
            'zipcode' => 'required',
            'city' => 'required'

        ]);

        //Request the input of the form
        $email = request('email');
        $street = request('street');
        $zipcode = request('zipcode');
        $city = request('city');
        $order = request('products');

        $products = $this->fetchProducts();

        //TODO: Create new rules to add the discount codes
        foreach($order as $i => $orderedProduct) {
            if ($orderedProduct > 0) {
                for($x = 1; $x < count($products)+1; ++$x){
                   if( 1000+$x == strval($i)){
                       $id = $products[1000+$x]['id'];
                       $amount = $orderedProduct;
                       $price = $products[$id]['price'];
                       $discount = $products[$id]['discountCode'];                  

                    switch($discount) {
                        case 0:
                            $discountMsg = "";
                            $price = $amount * $price;
                            break;

                        case 1:
                            //buy two get one free 
                            $discountMsg = "You get one product for free because of the buy two and get one free promotion!";
                            if($orderedProduct = 2){
                                $amount = $orderedProduct + 1;
                                $price = $price*2;
                            }
                            break;

                        case 2:
                            //20% discount
                            $discountPercentage = 20;
                            $discountMsg = "You get ".$discountPercentage."% discount on this product!";
                            $price = $orderedProduct * ($price -($price * $discountPercentage/100 ));
                            break;

                        case 3:
                            //3 products with min amount 2 pieces, cheapest product gets 50% discount 
                            break;
                    }
                    
                    }
                }
            }
        };

        
        $alert = "Thank you for your order! We will deliver as soon as possible to the following adress: {$street}, {$zipcode} - {$city}.
                Your order is: {$amount} x {$id} for the total of {$price}. {$discountMsg}";

        return view('shoppingcart')->with('alert', $alert);
    }
}
