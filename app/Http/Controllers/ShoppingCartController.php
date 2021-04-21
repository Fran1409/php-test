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

        //TODO: Create new rules to add the discount codes
        foreach($order as $i => $orderedProduct) {
            if ($orderedProduct > 0) {
                //var_dump($i);
                //var_dump($orderedProduct);
            }
        };

        
        $alert = "Thank you for your order! We will deliver as soon as possible on the following adress: {$street}, {$zipcode} - {$city}";

        return view('shoppingcart')->with('alert', $alert);
    }
}
