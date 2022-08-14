<!DOCTYPE html>
<html lang="en">
<head>
  <title>user list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  


</head>
<body>



 <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-block-inline" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
                   
                </a>
                <!-- <a href="{{ url('post') }}" class="text-dark font-weight-blod" style="text-decoration: none;">
                     <h5 class="m-auto">Back</h5>
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

               {{--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown float-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> --}}
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




<div class="container">

  
  <div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">User List:</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">

{{--                                  --}}

<div class="col-md-4 float-right d-block-inline">

<div class="input-group my-4 ">
    
  <input type="text" class="form-control" placeholder="search user" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append bg-primary">
    <span class="input-group-text bg-secondary text-light" id="search">search</span>
  </div>
</div>
</div>
{{-- ================================= --}}

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-secondary text-light text-center">
                    <tr>
                        <th scope="col" style="width: 15%;">Sr.</th>
                        <th scope="col" style="width: 45%;">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
              <tbody>
                @php 
                    $sr = 1;
                @endphp
                    @foreach($list as $user)
                    <tr>
                      <th scope="row">{{ $sr++ }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                     
                    </tr>
                  @endforeach
                                 
                </tbody>
            </table>
        </div>
    </div>
</div>

  </div>
</div>


    <a href="{{ url('home') }}" class="btn btn-dark" style="text-decoration: none;font-weight: bold;"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>


</div>



</body>
</html>