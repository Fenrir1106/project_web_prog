@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2;">
        <div class="col-lg-10 bg-light mx-auto my-3">
            <div class="py-3 col-lg-11">
                <h4>Insert New Category</h4>
            </div>
            <div class="col-lg-12 mb-5">
                <form action="{{ route('category.add') }}" method="POST">
                    @csrf
                    <input type="text" name="category_name" placeholder="Category Name" class="mb-2 w-100" style="height: 50px;"> <br>
                    <input type="submit" value="Add" class="btn btn-warning btn-sm float-right">
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