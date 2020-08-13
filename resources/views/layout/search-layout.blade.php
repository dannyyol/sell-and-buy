<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'Shopify')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('static/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('static/css/styles.css')}}" rel="stylesheet">
  <link href="{{ asset('static/css/fontawesome-all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</head>
<body>
{{-- Header --}}
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto" style="font-size:1.2rem;">
        {{--  <li><div class="container h-100">
           <div class="d-flex justify-content-center h-100">
              <div class="searchbar">
            comment   <input class="search_input" type="text" name="" placeholder="Search...">
               <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
             </div>
           </div>
         </div></li>--}}
          {{-- <li class="nav-item active">
            <a class="nav-link" href=""><i class="fa fa-home"></i> Home</span>
              <span class="sr-only">(current)</span>
            </a>
          </li> --}}
          {{--{<li class="nav-item">
            <a class="nav-link" href="{{ route('lists') }}">Products</a>
          </li>--}}

          @guest
            <li class="nav-item" style="font-size:0.8rem;">
              <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Signin</a>
            </li>

            <li class="nav-item large_register" style="font-size:0.8rem;">
              <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered"></i>{{ __('Register') }}</a>

            </li>
          @else
                <li class="dropdown" style="padding-right:20px;font-size:1rem;">
                   <a href="{{url('/')}}" class="dropdown-toggle" data-toggle="dropdown" style="color:rgb(105, 105, 105);">{{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu animated fadeInUp">
                        <li><a href="{{url('/')}}">Front End</a></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </li>


            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Logout</a>
            </li> --}}
          @endguest

          <li class="nav-item large_register">
            <a class="nav-link btn btn-success" href="{{ route('register') }}" style="color:#fff;"><i class="fa fa-ad"></i> Post Advert</a>
          </li>

          <li class="fa fa-arrow"></li>
        </ul>
      </div>

  </nav>
@yield('content')
<footer class="py-5 bg-dark flex-wrapper">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('static/js/jquery-1.9.1.min')}}"></script>
<script src="{{ asset('static/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
