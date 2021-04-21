@extends('layout')
@extends('header')

@section('content')
<div class="box">
    <h1>Articles</h1>

    <form method="post" action="/shoppingcart">
        @csrf
        <fieldset>
            <legend>Order here</legend>

            <div class="form-row">
                <div class="form-group col-lg">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email')}}">
                    @error('email')
                        <p class="text-danger">{{$errors->first('email') }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md">
                    <label for="street">Street + streetnumber:</label>
                    <input type="text" name="street" id="street" class="form-control" value="{{ old('street')}}">
                    @error('street')
                        <p class="text-danger">{{$errors->first('street') }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="zipcode">Zipcode:</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="{{ old('zipcode')}}">
                    @error('zipcode')
                        <p class="text-danger">{{$errors->first('zipcode') }}</p>
                    @enderror
                </div>
                <div class="form-group col-md">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city')}}">
                    @error('city')
                        <p class="text-danger">{{$errors->first('city') }}</p>
                    @enderror
                </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-row">
                <div class="form-group  col-md">
                    @foreach ($products as $i => $product)
                        <label for="product-{{$i}}">{{ $product['id'] }} - {{ $product['name'] }} - € {{ $product['price'] }} - {{ $product['btw'] }}</label>
                        <input type="number" id="product-{{$i}}" name="products[{{$product['id']}}]" class="form-control" value="{{$product['amount']}}"><br>
                    @endforeach
                </div>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-secondary" name="submit">Order!</button>
    </form>

</div>
@endsection

@extends('footer')