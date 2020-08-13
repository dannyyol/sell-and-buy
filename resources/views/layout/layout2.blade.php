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
  <script
    src="https://code.jquery.com/jquery-3.4.0.min.js"
    integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
    crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">

</head>
<body>
{{-- Header --}}
<div class="jumbotron jumbotron_header bg-light" style="max-height:200px;">
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

            <li class="nav-item" style="font-size:0.8rem;">
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
    </div>
  </nav>

  <section class="search-sec search_sh">
  <div class="container">
      <form action="{{ url('/search') }}" method="POST" role="search">
        {{ csrf_field() }}
          <div class="row">
              <div class="col-lg-12">
                  <div class="row">
  {{-- comment          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                          <input type="text" class="form-control search-slt" placeholder="Enter Pickup City">
                      </div>
                      --}}
                      <div class="col-lg-6 col-md-6 col-sm-5 search_box p-0">
                          <input type="text" class="form-control search-slt" placeholder="Enter Drop City" name="q">
                      </div>

                  </form>
                      <div class="col-lg-3 col-md-3 col-sm-4 select_box p-0">
                          <select class="form-control search-slt" id="exampleFormControlSelect1" name="" onchange="location = this.value;">
                            <option>Choose school</option>
                            @foreach ($schools as $school)
                              <option value="{{ route('school.show_frontend', $school-> id) }}">{{ $school->name }}</option>
                            @endforeach

                          </select>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 search_button p-0">

                        <button type="submit" class="btn wrn-btn float-right search_lg">Search</button>
                          <button type="submit" class="btn wrn-btn float-right search_sm"><span class="fa fa-search"></span></button>
                      </div>
                  </div>
              </div>
          </div>
  </div>
  </section>
</div>

@yield('content')
  <!-- Footer -->
  <footer class="py-5 flex-wrapper">
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
