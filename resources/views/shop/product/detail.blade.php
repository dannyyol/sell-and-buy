@extends('layout.layout3')
@section('content')
  <div class="container">
    <style>

/*#####################
Additional Styles (required)
#####################*/
#myCarousel .list-inline {
    white-space:nowrap;
    overflow-x:auto;
}

#myCarousel .carousel-indicators {
    position: static;
    left: initial;
    width: initial;
    margin-left: initial;
}

#myCarousel .carousel-indicators > li {
    width: initial;
    height: initial;
    text-indent: initial;
}

#myCarousel .carousel-indicators > li.active img {
    opacity: 0.7;
}
    </style>
    @include('session.success')

    @guest
      <div class="forum_guest_login alert alert-primary alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
        <strong><a href="{{route('login')}}">Login</a></strong> to be able to comment <a href="{{route('register')}}" class="alert-link">. Click here</a> if you dont have an account.
      </div>
    @endguest
      
  
    <div id="navigation">
        <a href="{{ route('forum.create') }}" class="btn float-right create_post_sm create_post_lg">Create Post</a>
    <style>
        
      </style>
      <div id="left_navigation">
        <li>
          <a href="./">Home</a>
        </li>
        <li>
          >
        </li>
        <li>
          <a href="">Product</a>

        </li>
        <li> > </li>
        <li> 
            {{$products->name}}
        </li>
        {{-- <li>
          @foreach ($cate as $cate)
          <a href="{{ route('forum.index', ['id'=>$cate->id, 'category' => $cate->slug] )}}">{{$td_category->name}}</a>
          @endforeach 
      </li>
        <li> > </li> --}}
        {{-- <li>{{$thread->subject}}</li>
        <li class="create_post_hide_lg">></li> --}}
        <li>
          <a href="{{ route('products.create') }}" class="create_post_hide_lg"> 
            Create Post
          </a>
        </li>
      </div>
    </div>

    <br>
    
    <div class="row text-center">
      <div class="col-lg-8 col-md-8 mb-2">
        <div class="card p-2 card_product">


       <div class="" id="slider">
               <div id="myCarousel" class="carousel slide">
                   <!-- main slider carousel items -->
                   <div class="carousel-inner">
                     @if ($products->filename)
                       @php
                         $filename = json_decode($products->filename);
                       @endphp
                       @foreach ($filename as $element)

                         @if ($loop->first)
                       <div class="active item carousel-item" data-slide-number="0">
                           <img src="{{ url('images/product', $element) }}" class="img-fluid" style="max-height:25rem;width:100%;">
                       </div>
                     @endif
                  @endforeach
                @else
                @endif

                @if ($products->filename)
                  @php
                    $filename = json_decode($products->filename);
                  @endphp
                    <?php $x0=1; ?>
                  @foreach(array_slice($filename, 1) as $element)

                       <div class="item carousel-item" data-slide-number="{{ $x0++ }}">
                           <img src="{{ url('images/product', $element) }}" class="img-fluid"  style="max-height:25rem;width:100%;">
                       </div>
                     @endforeach
                   @else
                   @endif
                       {{-- <div class="item carousel-item" data-slide-number="2">
                           <img src="http://placehold.it/1200x480&amp;text=three" class="img-fluid">
                       </div>
                       <div class="item carousel-item" data-slide-number="3">
                           <img src="http://placehold.it/1200x480&amp;text=four" class="img-fluid">
                       </div>
                       <div class="item carousel-item" data-slide-number="4">
                           <img src="http://placehold.it/1200x480&amp;text=five" class="img-fluid">
                       </div>
                       <div class="item carousel-item" data-slide-number="5">
                           <img src="http://placehold.it/1200x480&amp;text=six" class="img-fluid">
                       </div>
                       <div class="item carousel-item" data-slide-number="6">
                           <img src="http://placehold.it/1200x480&amp;text=seven" class="img-fluid">
                       </div>
                       <div class="item carousel-item" data-slide-number="7">
                           <img src="http://placehold.it/1200x480&amp;text=eight" class="img-fluid">
                       </div> --}}

                       {{-- <a class="carousel-control left pt-3" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                       <a class="carousel-control right pt-3" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a> --}}
                      <br>
                   </div>
                   <!-- main slider carousel nav controls -->


                   <ul class="carousel-indicators list-inline">
                     @if ($products->filename)
                       @php
                         $filename = json_decode($products->filename);
                       @endphp
                       @foreach ($filename as $element)
                         <?php $x=1; ?>
                         @if ($loop->first)
                       <li class="list-inline-item active">
                           <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                               <img src="{{ url('images/product', $element) }}" class="img-fluid" style="height:5rem;width:5rem;">
                           </a>
                       </li>
                     @endif
                  @endforeach
                @else
                @endif

                @if ($products->filename)
                  @php
                    $filename = json_decode($products->filename);
                  @endphp
                  <?php $x=1; ?>
                  @foreach(array_slice($filename, 1) as $element)
                       <li class="list-inline-item">
                           <a id="carousel-selector-1" data-slide-to="{{ $x++ }}" data-target="#myCarousel">
                               <img src="{{ url('images/product', $element) }}" class="img-fluid" style="height:5rem;width:5rem;">
                           </a>
                       </li>

                     @endforeach
                   @else
                   @endif
                       {{-- <li class="list-inline-item">
                           <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=three" class="img-fluid">
                           </a>
                       </li>
                       <li class="list-inline-item">
                           <a id="carousel-selector-3" data-slide-to="3" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=four" class="img-fluid">
                           </a>
                       </li>
                       <li class="list-inline-item">
                           <a id="carousel-selector-4" data-slide-to="4" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=five" class="img-fluid">
                           </a>
                       </li>
                       <li class="list-inline-item">
                           <a id="carousel-selector-5" data-slide-to="5" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=six" class="img-fluid">
                           </a>
                       </li>
                       <li class="list-inline-item">
                           <a id="carousel-selector-6" data-slide-to="6" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=seven" class="img-fluid">
                           </a>
                       </li>
                       <li class="list-inline-item">
                           <a id="carousel-selector-7" data-slide-to="7" data-target="#myCarousel">
                               <img src="http://placehold.it/80x60&amp;text=eight" class="img-fluid">
                           </a>
                       </li> --}}
                   </ul>
           </div>
       </div>


   <!--/main slider carousel-->
   <h4 align="left">Ad Details</h4>
          <div class="card bg-light" style="padding:-10px;padding:10px;">
            <h4 class="d-flex justify-content-left" style="color:rgb(105, 105, 105);">{{$products->name}}</h4>
            <p class="d-flex justify-content-left" style="color:rgba(105, 105, 105, 0.8);"><i class="far fa-clock"> Posted {{ $products->updated_at->format('l jS \\of F Y h:i:s A')}}</i></p>
            <p class=" d-flex justify-content-left" style="color:rgba(105, 105, 105, 0.8);"><i class="fa fa-map-marker">Adekunle Ajasin University Ondo State</i></p>
            <hr>
            <p class="d-flex justify-content-left" style="text-align:left;color:rgb(105, 105, 105);">Very clean and sharp Mercedes-Benz ML 350 4MATIC 2006 engine,gear and air-condition working {{$products->description}}</p>
          </div>

        </div>
      </div>

      <div class="col-lg-4 col-md-4 mb-2">
        <div class="card card_product" style="max-height:45rem;">
          <div class="card-header bg-success d-flex justify-content-center" style="height:5rem; font-size:1.5rem;color:#fff;">
            #{{$products->price}}
          </div>
          <div class="card-body">
            <img src="{{ asset('static/images/avatar.png') }}" alt="" style="width:150px;height:150px;border-radius:75px;">
            <p class="card-text" style="font-size:1.5rem;"><b></b><a href="{{ route('user_profile', $products->user->name) }}">{{ $products->user->name}}</a></p>
            <p class="float-right pricing" style="font-size:18px;color:#fff;">#2000</p>
            <button type="button" id ="myDIV" class="btn btn-success" onclick="myFunction()" style="width:100%;">Phone Number</button>
            <br /><br />
            <form action="{{ url('messages') }}" method="POST">
              {{ csrf_field() }}
              <fieldset class="form-group">
                <input type="email" class="form-control nav-linkdisabled" id="email" name="email" placeholder="Enter email" value="daniel.borngreat@io" readonly>
                <small class="text-muted">We'll never share your email with anyone else.</small>
              </fieldset>
              <fieldset class="form-group">
                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter message" name="bodyMessage" id="bodyMessage"></textarea>
              </fieldset>

            <button type="submit" class="btn btn-success bg-light" style="width:100%;color:green;">Send Message</button>
            {{-- <p class="float-left">Select Size</p>
            <br>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect02">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <button type="" name="button" class="btn btn-block btn-primary">Add Cart</button>
             --}}
             </form>
          </div>

        </div>
      </div>
  </div>
<br />
<h4>Related Adverts</h4>
  @forelse ($rel_products as $product)
    <div class="card mb-3 card_product" style="border:0px;">
      <div class="col-md-12 float-left" style="margin-right: -30px;">

        <a href="{{ route('products.show', $product->id) }}">

          @if ($product->filename)
            @php
              $filename = json_decode($product->filename);
            @endphp
            @foreach ($filename as $element)
              @if ($loop->first)
                <img class="card-img-top image-resize" style="" src="{{ url('images/product', $element) }}" alt="{{$product->name}}">
              @endif
            @endforeach
          @else
          @endif
        </a>
        <div class="float-right product_content1" style="">
          <div style="padding-top:10px;">
            <h6 class="card-title product-name">{{ $product-> name}}</h6>
            <p style="color: rgba(0, 230, 64, 1);font-weight:bold;font-size:16px;float:right;">#{{$product->price}}</p>
            <p class="condition">Status: Used</p>

            <p class="hide_for_sm">{{ str_limit($product->description, $limit = 100, $end = '...') }}</p>
            <div class="j">
              <p class="" style=""><small class="text-muted"><i class="far fa-clock"></i> Posted {{ $product->updated_at->diffForHumans()}}</small>
              <small class="text-muted"> <i class="fa fa-map-marker"></i> {{ str_limit($product->school->name, $limit = 100, $end = '...') }}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div style=""><h3 align="center">No item is available</h3></div>
  @endforelse

     </div>
       <div class="d-flex justify-content-center">
        
      </div>

</div>
<br><br>
@php

@endphp
@endsection
<script src="//code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">
function myFunction() {
var x = document.getElementById("myDIV");
if (x.innerHTML === "Phone Number") {
  x.innerHTML = "<button type='button' class='btn btn-success' style='width:100%;''> @if($products->user->userprofile)<a href='tel:{{ $products->user->userprofile->mobile }}'  style='color:#fff;'>{{ $products->user->userprofile->mobile }} @else Null </a>@endif</button>";
} else {
  x.innerHTML = "Phone Number";
}
}

$('#myCarousel').carousel({
		interval:   4000
	});
</script>
