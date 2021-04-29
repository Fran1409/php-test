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
                var_dump($i .'<br>');
                //var_dump($orderedProduct);
                for($x = 1; $x < count($products)+1; ++$x){
                    //var_dump(1000+$x .'<br>');
                   if( 1000+$x == strval($i)){
                       $discount = $products[1000+$x]['discountCode'];
                        var_dump($discount .'<br>');
                    }
                }
            }
        };

        
        $alert = "Thank you for your order! We will deliver as soon as possible to the following adress: {$street}, {$zipcode} - {$city}";

        return view('shoppingcart')->with('alert', $alert);
    }
}
