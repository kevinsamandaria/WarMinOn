<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>WarMinOn</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .navbar{
            background-color: #F1E7C3;
        }

        form{
            width: 300px;
        }
        a{
            font-size: 18px;
        }

        .footer{
            background-color: #F1E7C3;
            height: 10%;
        }

        #main{
            min-height: 58vh;
            height: auto !important;
            height: 100%;
            margin: 0 auto -60px;
        }

        select{
            width: 25px;
        }
        /* form{
            width: 30%;
        } */
    </style>
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark text-light">
        <div class="container-fluid">
            <img src="{{asset('storage/assets/WarminOn.png')}}" alt="" width="100" height="100" class="ms-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="/">Home</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-lg me-2 text-dark"></i>{{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->role == 1)
                                <li><a class="dropdown-item" href="/cart">Cart</a></li>
                                <li><a class="dropdown-item" href="/transaction">Transaction</a></li>
                                <li><a class="dropdown-item" href="/profile">Update Profile</a></li>
                            @else
                                <li><a class="dropdown-item" href="/dashboard">Dasboard</a></li>
                                <li><a class="dropdown-item" href="/insert">Insert Product</a></li>
                                <li><a class="dropdown-item" href="/deleteproduct">Delete Product</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/login">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/register">Register</a>
                    </li>
                    @endauth
                </ul>
                <div class="d-flex">
                    <form class="d-flex w-75" method="POST" action="/search">
                        @csrf
                    <select id="disabledSelect" class="form-select" aria-label="Default select example" style="width: 110px" name="categories">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->categories}}</option>
                    @endforeach
                    </select>
                        <div class="mx-3 d-flex">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" style="min-width: 30vh">
                            <button class="btn btn-link text-dark" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="col-xl-12 my-5" id="main">
        @yield('content')
    </div>

    <div class="footer">
        <div class="container text-center py-4">
            <p class="text-dark fst-italic">&#169Copyright MbWekCenter 2021</p>
        </div>
    </div>
    {{-- </footer> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  </body>
</html>
