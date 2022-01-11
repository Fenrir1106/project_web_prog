@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="col-lg-12 text-center my-3"><h3>New Product</h3></div>
        <div class="d-flex flex-wrap justify-content-around px-4 col-lg-12">
            @if (!$is_empty)
                @foreach ($products as $product)
                    <div class="card border-warning col-lg-3 m-2 p-2">
                        <img src="{{ asset($product->image_path) }}" alt="image" class="card-img-top" style="height: 350px;width: auto">
                        <div class="card-body p-0 pt-1">
                            <div>
                                <h4 class="card-title">{{$product->name}}</h4>
                                <p>{{$product->category->name}}</p>
                            </div>
                            <div>
                                <p class="text-primary">IDR. {{number_format($product->price, 2, ',', '.')}}</p>
                            </div>
                        </div>
                        <form action="{{ route('product.detail', ["product" => $product->id]) }}" method="GET">
                            <input type="submit" value="More Detail" class="btn btn-warning">
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row pl-5 pt-3" style="background-color: #ccd9e2">
        {{$products->links()}}
    </div>
@endsection