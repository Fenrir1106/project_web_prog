<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Project Web Prog</title>
</head>
<body>
    <div class="container-fluid p-0">
        <header>
            <div class="bg-warning d-flex col-lg-12">
                <div class="d-flex col-lg-2">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" style="width: 50px;height: 50px;margin: 10px 10px 10px 20px">
                    <p class="font-weight-bolder" style="font-size: 25px">DY.ID</p>
                </div>
                <div class="col-lg-10">
                    <form action="{{ route('product.search') }}" method="POST" style="margin: 17px 10px 0px 30px">
                        @csrf
                        <div class="d-flex form-group">
                            @if (!empty($search_bar))
                                <input type="text" name="search_bar" class="form-control" value="{{$search_bar}}">
                            @else
                                <input type="text" name="search_bar" placeholder="Search Product...." class="form-control">
                            @endif
                            <input type="image" name="submit" src="{{ asset('image/search_icon.png') }}" alt="submit" class="mt-2 ml-3" style="width: 15px;height: 15px">
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-light d-flex" style="background-color: #285185">
                @if ($login_token)
                    @if ($role == "admin")
                        <div class="col-lg-6 d-flex">
                            <div>
                                <form action="{{ route("home") }}">
                                    <input type="submit" value="Home" class="btn text-light font-weight-bold" style="color: #285185">
                                </form>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="btn text-light dropdown-toggle" style="color: #285185" data-toggle="dropdown">Manage Product</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('product.show') }}">View Product</a>
                                    <a class="dropdown-item" href="{{ route('product.add.show') }}">Add Product</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="btn text-light dropdown-toggle" style="color: #285185" data-toggle="dropdown">Manage Category</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('category.show') }}">View Category</a>
                                    <a class="dropdown-item" href="{{ route('category.add.show') }}">Add Category</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 d-flex">
                            <div>
                                <form action="{{ route("home") }}">
                                    <input type="submit" value="Home" class="btn text-light font-weight-bold" style="color: #285185">
                                </form>
                            </div>
                            <div>
                                <form action="{{ route("cart") }}">
                                    <input type="submit" value="My Cart" class="btn text-light" style="color: #285185">
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('transaction') }}">
                                    <input type="submit" value="History Transaction" class="btn text-light" style="color: #285185">
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-6 justify-content-end d-flex">
                        <form action="{{ route("logout") }}">
                            <input type="submit" value="Logout" class="btn btn-outline-light btn-sm m-1">
                        </form>
                    </div>
                @else
                    <div class="col-lg-6">
                        <form action="{{ route("home") }}">
                            <input type="submit" value="Home" class="btn text-light font-weight-bold" style="color: #285185">
                        </form>
                    </div>
                    <div class="col-lg-6 justify-content-end d-flex">
                        <form action="{{ route('login') }}">
                            <input type="submit" value="Login" class="btn btn-outline-light btn-sm m-1">
                        </form>
                        <form action="{{ route('register') }}">
                            <input type="submit" value="Register" class="btn btn-outline-light btn-sm m-1">
                        </form>
                    </div>
                @endif
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="text-light text-center" style="background-color: #285185">
                <div style="padding-top: 15px; padding-bottom: 15px; width: 200px" class="d-inline-flex justify-content-around">
                    <i style="font-size:24px" class="fa fa-facebook"></i>
                    <i style="font-size:24px" class="fa fa-instagram"></i>
                    <i style="font-size:24px" class="fa fa-whatsapp"></i>
                </div>
                <div class="text-light">
                    &copy 2021 Copyright DY20-1
                </div>
            </div>
        </footer>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>