
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<head>
  <title>@yield('title', 'Shopify')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('static/css/style_profiles.css')}}" rel="stylesheet">
  <link href="{{ asset('static/css/fontawesome-all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/main.j') }}"></script>
</head>


<body  style="background-color: rgba(128,128,128, 0.1);">
  <style media="screen">
  @media only screen and (max-width: 768px) {
    .img-thumbnail{
        width: 250px;;
        height: 250px;
        overflow: auto;
    }

    .thumbnail img{
        // your styles for the image
        width: 100%;
        height: auto;
        display: block;
    }
    .flex-wrapper{
      margin-top: 60px;
    }
    .side-padding{
      margin: 15px;
    }
  }
  @media only screen and (min-width: 768px) {
    .img-thumbnail{
        width: 200px;
        height: 200px;
        overflow: auto;
    }
  }
  </style>

  <nav id="sidebar" style="margin-top:45px;">
      <div id="dismiss">
          <i class="fas fa-arrow-left" style="margin-top:12px;"></i>
      </div>
      <div class="sidebar-header">
          {{-- <h3>Bootstrap Sidebar</h3> --}}

            @if (!Auth::guest())
              @if (Auth::user()->UserProfile)
                <div class="d-flex justify-content-center">
                  <img src="{{ url('images/profile', Auth::user()->userprofile->photo) }}" style="width:150px;height:150px;border-radius:75px;" alt="{{Auth::user()->userprofile->photo}}">
                </div>
              @else
                <div class="d-flex justify-content-center">
                    <a href="{{ route('user_profile',auth()->user()) }}">
                      <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:100px;height:100px;border-radius:50px;">
                    </a>
                  </div>
              @endif
              <div class="d-flex justify-content-center">Hi {{Auth::user()->name}}</div>
            @endif
            @guest
                <h3>Join NairaLand</h3>
            @endguest
      </div>

      <ul class="list-unstyled components">

        @if (!Auth::guest())


          {{-- Notification --}}

          <li id = "markasread" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadnotifications) }}')">
            <a href="#notify" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style=""><span class="fa fa-globe"></span> Notification<span class="badge badge-info badge-pill float-right">{{ count(auth()->user()->unreadnotifications) }}</span>
            </a>

               <ul class="collapse animated fadeInUp list-unstyled" role="menu" id="notify" style="padding-left:30px;">

                   <li style="color:rgb(105, 105,105);">
                     @forelse (auth()->user()->unreadnotifications as $notification)
                       @include('shop.forum.partials.'.snake_case(class_basename($notification->type)))
                     @empty
                       No Unread Notifications
                     @endforelse
                   </li>
               </ul>
          </li>
          {{-- end notification --}}
            @endif

            <div class="">
              @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Signin</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered"></i> {{ __('Register') }}</a>

                </li>
              @else


                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-folder-open"></i>{{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0px;background-color:inherit;">
                    <a class="dropdown-item" href="{{url('/')}}" style="margin-top:-20px;">Home</a>
                    <a class="dropdown-item" href="{{ route('user_profile',auth()->user()) }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/logout')}}">Log Out</a>
                  </div>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Log Out</a>
                </li>

              @endguest
            <hr>
            <li class="">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-comments"></i>
                    Thread
                </a>
                <ul class="list-unstyled collapse animated fadeInUp" id="homeSubmenu"  style="">
                    <li>
                        <a href="{{ route('forum.index') }}">All Threads</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>

                <ul class="list-unstyled">
                  {{-- <li>
                    <a href="#">
                      <span class="fas fa-hotel"></span> Hostels
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-hotel"></span> Hostels
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-mobile"></span> Phone
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-laptop"></span> Laptops
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-book"></span> Books/Materials
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-tv"></span> Electronics
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="fas fa-plus-circle"></span> Others
                    </a>
                  </li> --}}
                </ul>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Advert
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                  <a href="{{route('products.create')}}"  style="margin-top:0px;">Create Advert</a>
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-hotel"></span> Hostels
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-mobile"></span> Phone
                  </a>
                  {{-- <div class="dropdown-divider"></div> --}}
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-laptop"></span> Laptops
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-book"></span> Books/Materials
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-tv"></span> Electronics
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="fas fa-plus-circle"></span> Others
                  </a>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-image"></i>
                    Portfolio
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question"></i>
                    FAQ
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    Contact
                </a>
            </li>



        </ul>


  </nav>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">

      <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i>
          <span></span>
      </button>
      <ul class="navbar-nav ml-auto d-flex flex-row-reverse" style="font-size:1.2rem;">
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

          {{-- <li class="fa fa-arrow"></li>

          <li class="nav-item authentication_sm_hide" style="font-size:0.8rem;">
            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered"></i>{{ __('Register') }}</a>

          </li>

          <li class="nav-item" style="font-size:0.8rem;">
            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Signin</a>
          </li> --}}


        @else
              {{-- <li class="dropdown" style="padding-right:20px;font-size:1rem;">
                 <a href="{{url('/')}}" class="dropdown-toggle" data-toggle="dropdown" style="color:rgb(105, 105, 105);">Hello {{Auth::user()->name}} <b class="caret"></b></a>
                  <ul class="dropdown-menu animated fadeInUp">
                      <li><a href="{{url('/')}}">Front End</a></li>
                      <li><a href="{{url('/logout')}}">Logout</a></li>
                  </ul>
              </li> --}}


              {{-- <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                   <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;">
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('/')}}">Front End</a>
                  <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                </div>
              </div> --}}


              {{-- <ul class="navbar-nav">
                <li class="nav-item dropdown profile_pic" style="">
                  <a class="nav-link" href="#" id="member-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:40px;height:40px;border-radius:20px;">
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="member-dropdown" style="color:rgb(105,105,105);">
                    <span class="dropdown-item-text">Logged in as <strong>{{Auth::user()->name}}</strong>
                    </span>
                    <div class="dropdown-divider"></div>
                      <a href="{{ route('user_profile',auth()->user()) }}" class="dropdown-item">
                        <i class="fas fa-large fa-cog fa-fw"></i>Profile
                      </a>

                      <a href="{{route('logout')}}" class="dropdown-item">
                        <i class="fas fa-large fa-sign-out-alt fa-fw"></i>Log Out
                      </a>
                    </div>
                  </ul> --}}

                  {{-- <li class="large_register authentication_sm_hide" style="">
                    <a class="nav-link btn btn-success" href="{{ route('register') }}" style="color:#fff;"><i class="fa fa-ad"></i> Post Advert</a>
                  </li>

                  <h4 style="color:rgb(105,105,105);margin-right:10px;">Bootstrap Sidebar</h4> --}}






          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Logout</a>
          </li> --}}
        @endguest


      </ul>


  </div>
</nav></div>
@yield('content')



  <!-- Footer -->
    <footer class="py-5 bg-dark flex-wrapper" style="background-color:#0001;width:100%;padding:5%;">

      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('static/js/jquery-1.9.1.min')}}"></script>
  <script src="{{ asset('static/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</body>

</html>
