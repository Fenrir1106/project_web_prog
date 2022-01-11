@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="d-flex col-lg-8 bg-light mx-auto my-4 border border-dark">
            <div class="col-lg-6">
                <img src="{{ asset($product->image_path) }}" alt="" style="width: inherit; height: auto">
            </div>
            <div class="py-5 col-lg-6" style="background-color: #f8f9fa">
                <h4 class="text-weight-bold my-3">{{$product->name}}</h4>
                <div class="card border border-top-0 border-right-0 border-left-0 border-dark" style="background-color: #f8f9fa">
                    <p class="text-weight-bold">Category:</p>
                    <p>{{$product->category->name}}</p>
                </div>
                <div class="card border border-top-0 border-right-0 border-left-0 border-dark" style="background-color: #f8f9fa">
                    <p class="text-weight-bold">Price:</p>
                    <p>{{number_format($product->price, 2, ',', '.')}}</p>
                </div>
                <div class="card border border-top-0 border-right-0 border-left-0 border-dark" style="background-color: #f8f9fa">
                    <p class="text-weight-bold">Description:</p>
                    <p>{{$product->description}}</p>
                </div>
                <div class="py-4">
                    @if ($login_token)
                        @if ($role == "member")
                            <form action="{{ route('cart.add', ["product" => $product->id]) }}" method="POST">
                                @csrf
                                <label for="" class="mr-3">Qty:</label>
                                <input type="number" name="quantity" style="width: 80px"> <br>
                                <input type="submit" value="Add to cart" class="btn btn-warning btn-sm mt-2">
                            </form>
                        @endif
                    @else
                        <form action="{{ route('login') }}">
                            <input type="submit" value="Login to buy" class="btn btn-warning">
                        </form>
                    @endif
                </div>
                @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has("success"))
                    <div class="alert alert-success mt-5">
                        <ul>
                            <li>{{Session::get("success")}}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection