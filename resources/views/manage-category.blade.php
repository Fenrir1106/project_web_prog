@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="col-lg-12">
            <h3 class="p-3">Manage Categories</h3>
        </div>
        <div class="col-lg-11">
            <table class="table table-bordered table-striped table-warning ml-2" style="border-color: white">
                <thead>
                    <tr>
                        <th class="col-lg-1">No</th>
                        <th class="col-lg-5">Category Name</th>
                        <th class="col-lg-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('category.edit.show', ['category' => $category->id]) }}" class="mr-2">
                                        @csrf
                                        <input type="submit" value="Edit" class="btn btn-warning btn-sm">
                                    </form>
                                    <form action="{{ route('delete.category', ['category' => $category->id]) }}" method="POST">
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