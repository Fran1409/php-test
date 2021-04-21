<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function submitForm(Request $request)
    {
        request()->validate([
            'email' => 'required|email:rfc,dns',
            'street' => 'required',
            'zipcode' => 'required',
            'city' => 'required'

        ]);

        dump(request()->all());

        $email = request('email');
        $street = request('street');
        $zipcode = request('zipcode');
        $city = request('city');
        $order = request('products');

        //dd($this->fetchProducts());
        //var_dump($order);

        foreach($order as $i => $orderedProduct) {
            if ($orderedProduct > 0) {
                var_dump($i);
                //var_dump($orderedProduct);
            }
        };

        
        $alert = "Thank you for your order! We will deliver as soon as possible on the following adress: {$street}, {$zipcode} - {$city}";

        return view('shoppingcart')->with('alert', $alert);
    }
}
