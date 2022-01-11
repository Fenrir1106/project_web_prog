@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="col-lg-12 m-3 mr-0">
            <h4>My Cart</h4>
        </div>
        <div>
            @if (!$is_empty)
                @foreach ($carts as $cart)
                    <div class="col-lg-11 my-3 ml-4 bg-light p-3 d-flex">
                        <div class="col-lg-2">
                            <img src="{{ asset($cart->product->image_path) }}" alt="" style="width: inherit;height: auto">
                        </div>
                        <div>
                            <h4>{{$cart->product->name}}</h4>
                            <div>
                                <p>IDR: {{number_format($cart->product->price, 2, ',', '.')}}  X  {{$cart->quantity}} pc(s)</p>
                                <p>IDR: {{number_format($cart->product->price * $cart->quantity, 2, ',', '.') }}</p>
                            </div>
                            <div class="d-flex">
                                <form action="{{ route('cart.update.show', ['cart' => $cart->id]) }}" class="mr-2" method="POST">
                                    @csrf
                                    <input type="submit" value="Edit" class="btn btn-warning btn-sm">
                                </form>
                                <form action="{{ route('cart.delete', ["cart" => $cart->id]) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-lg-12 d-flex">
            <div class="col-lg-6">
                <p class="mx-2 my-1" style="font-weight: bold">Total Price:</p>
                <p class="mx-3">IDR: {{number_format($total_price, 2, ',', '.')}}</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end my-2">
                <form action="{{ route("checkout") }}" method="get">
                    <input type="submit" value="Checkout" class="btn btn-warning">
                </form>
            </div>
        </div>
    </div>
@endsection