@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="mx-auto bg-light col-md-8 my-5">
            <form action="{{ route("register.user") }}" class="p-3" method="POST">
                @csrf
                <h4 style="color: #285185">Join With Us</h4>
                <div class="my-3">
                    <input type="text" name="full_name" placeholder="Full Name" style="height: 50px;width: 100%">
                </div>
                <div class="my-3">
                    <label for="">Gender</label> <br>
                    <input type="radio" name="gender" value="male"> Male 
                    <input type="radio" name="gender" value="female"> Female
                </div>
                <div class="my-3">
                    <input type="text" name="address" placeholder="Address" style="height: 70px;width: 100%">
                </div>
                <div class="my-3">
                    <input type="text" name="email" placeholder="Email" style="height: 50px;width: 100%">
                </div>
                <div class="my-3">
                    <input type="password" name="password" placeholder="Password" style="height: 50px;width: 100%">
                </div>
                <div class="my-3">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" style="height: 50px;width: 100%">
                </div>
                <div class="float-right mb-3">
                    <input type="submit" value="Register Now" class="btn btn-warning">
                </div>
            </form>
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