@extends('master.layout')
@section('content')
    <div class="row" style="background-color: #ccd9e2">
        <div class="mx-auto bg-light col-md-3 my-5">
            <form action="{{ route('login.user') }}" class="p-3" method="POST">
                @csrf
                <h4 style="color: #285185">Welcome Back</h4>
                <div class="py-2">
                    <input type="text" name="email" id="email" placeholder="Email" style="height: 50px;width: 100%" class="my-2"> <br>
                    <input type="password" name="password" id="password" placeholder="Password" style="height: 50px;width: 100%" class="my-2">
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="remember_me" id="remember me">
                    <label for="remember_me">Remember Me</label>
                </div>
                <div class="float-right mb-3">
                    <input type="submit" value="Login" class="btn btn-warning">
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