@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="col-lg-12">
            <h3 class="p-3">Manage Product</h3>
        </div>
        <div class="col-lg-11">
            <table class="table table-bordered table-striped table-warning ml-2" style="border-color: white">
                <thead>
                    <tr>
                        <th class="col-lg-1">No</th>
                        <th class="col-lg-1">Product Image</th>
                        <th class="col-lg-2">Product Name</th>
                        <th class="col-lg-3">Product Description</th>
                        <th class="col-lg-2">Product Price</th>
                        <th class="col-lg-2">Product category</th>
                        <th class="col-lg-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img src="{{ asset($product->image_path) }}" alt="image" style="width: 100px;height: 50px;"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('product.edit.show', ['product' => $product->id]) }}" class="mr-2">
                                        @csrf
                                        <input type="submit" value="Edit" class="btn btn-warning btn-sm">
                                    </form>
                                    <form action="{{ route('product.delete', ['product' => $product->id]) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection