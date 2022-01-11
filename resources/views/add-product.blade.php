@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2;">
        <div class="col-lg-10 bg-light mx-auto my-3">
            <div class="py-3 col-lg-11">
                <h4>Insert New Product</h4>
            </div>
            <div class="col-lg-12 mb-5">
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Product Name" class="mb-2 form-control">
                    <textarea name="description" class="mb-2 form-control" placeholder="Product Description" rows="5"></textarea>
                    <input type="text" name="price" placeholder="Product Price" class="mb-2 form-control"> 
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-control" id="category">
                            <option value="" disabled selected hidden>Choose One</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control-file border">
                    </div>
                    <input type="submit" value="Add" class="btn btn-warning btn-sm float-right mb-3">
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