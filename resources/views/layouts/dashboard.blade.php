<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
</head>
<body>
<header class="py-2 bg-dark text-white mb-4">
    <div class="container">
        <h1 class="h3"> {{ config('app.name') }}</h1>
    </div>
</header>

<div class="container">


    <div class="row">
        <aside class="col-md-3">
            <h4> Navigation Menu</h4>
            <nav>
                <ul class="nav flex-column nav-pills ">
                    <li class="nav-item"><a href="{{route('admin.categories.create')}}" class="nav-link

                        @if(Route::current()->getName() == 'admin.categories.create')
                            active
                       @endif
                     ">Dashboard</a></li>
                    <li class="nav-item"><a href="{{route('admin.categories.index')}}" class="nav-link

                            @if(Route::current()->getName() == 'admin.categories.index')
                           active
                           @endif"> Categories</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Products</a></li>
                </ul>
            </nav>
        </aside>
        <main class="col-md-9">
            <div class="mb-4">
                <h3 class="text-primary">{{$title??'Defulte'}} </h3>
            </div>


            {{$slot}}


        </main>
    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>
</html>
