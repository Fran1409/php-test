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

        //dump(request()->all());

        //Request the input of the form
        $email = request('email');
        $street = request('street');
        $zipcode = request('zipcode');
        $city = request('city');
        $order = request('products');

        //dd($this->fetchProducts());
        //var_dump($order);

        $products = $this->fetchProducts();
        //var_dump($products);

        //TODO: Create new rules to add the discount codes
        foreach($order as $i => $orderedProduct) {
            if ($orderedProduct > 0) {
                //var_dump($i .'<br>');
                //var_dump($orderedProduct);
                for($x = 1; $x < count($products)+1; ++$x){
                    //var_dump(1000+$x .'<br>');
                   if( 1000+$x == strval($i)){
                       $id = $products[1000+$x]['id'];
                       $amount = $orderedProduct;
                       $price = $products[$id]['price'];
                       $discount = $products[$id]['discountCode'];
                        var_dump($discount .'<br>');                      
                    

                    switch($discount) {
                        case 0:
                            var_dump('no discount <br>');
                            break;

                        case 1:
                            var_dump('buy two get one free <br>');
                            if($orderedProduct = 2){
                                $amount = $orderedProduct + 1;
                                $price = $price*2;
                                var_dump($amount .'<br>'.$price);
                            }
                            break;

                        case 2:
                            var_dump('20% discount <br>');
                            $discountPercentage = 20;
                            $price = $orderedProduct * ($price -($price * $discountPercentage/100 ));
                            var_dump($amount .'<br>'.$price);
                            break;

                        case 3:
                            var_dump('3 products with min amount 2 pieces, cheapest product gets 50% discount <br>');
                            break;
                    }
                    }
                }
            }
        };

        
        $alert = "Thank you for your order! We will deliver as soon as possible to the following adress: {$street}, {$zipcode} - {$city}";

        return view('shoppingcart')->with('alert', $alert);
    }
}
