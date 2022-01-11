@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2;">
        <div class="col-lg-10 bg-light mx-auto my-3">
            <div class="py-3 col-lg-11">
                <h4>Insert New Product</h4>
            </div>
            <div class="col-lg-12 mb-5">
                <form action="{{ route('product.edit', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Product Name" class="mb-2 form-control" value="{{$product->name}}">
                    <textarea name="description" class="mb-2 form-control" placeholder="Product Description" rows="5">{{$product->description}}</textarea>
                    <input type="text" name="price" placeholder="Product Price" class="mb-2 form-control" value="{{$product->price}}"> 
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-control" id="category">
                            @foreach ($categories as $category)
                                @if ($category->id == $product->category_id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control-file border">
                        <label for="">image saved: {{$product->image_path}}</label>
                    </div>
                    <input type="submit" value="Save" class="btn btn-warning btn-sm float-right mb-3">
                </form>
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
        </div>
    </div>
@endsection