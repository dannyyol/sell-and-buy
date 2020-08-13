@extends('layout.layout3')

@section('content')

  <div class="container">
      @include('shop.forum.partials.success')
    {{-- <h4 style="color:rgb(105, 105,105);">
      {{ $products->count() }} Adverts In All Schools
    </h4> --}}
  <br>
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
    <a href="{{ route('products.create') }}" class="btn float-right create_post_sm create_post_lg">Post Advert</a>
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
        <a href="">All Schools</a>
    
        </li>
    <li>
      >
    </li>
    <li>
    <a href="">Adverts
      <span class="badge badge-pill badge-info">{{ $products->count() }}</span>
    </a>

    </li>
    <li> > </li>
    
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
        Post Advert
      </a>
    </li>
  </div>
</div>

<br>
  


  {{-- <nav class="navbar navbar-expand-sm category_list_bg">

      
     
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                  <a class="nav-link">
                  / 
                  </a>
              </li>


              <li class="nav-item">
                  <a class="nav-link"  href="#eight">
                   Adverts <span class="badge badge-pill badge-secondary">12</span>
                  </a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
              {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> --}}

                  
                  {{-- <select class="custom-select" id="inputGroupSelect01" onchange="location = this.value;">
                    <option selected>Choose...</option>
                    <option value="{{route('product.lists')}}/">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select> --}}
             
                
              
          {{-- </form>
  </nav> --}} 
  <br>
  @forelse ($products as $product)

    <div class="card mb-3 card_product" style="border:0px;">
      @if($product->negotiate)
        <div class="negotiable">
            <a>{{$product->negotiate}}</a>
        </div>
      @endif
      <div class="col-md-12 float-left" style="margin-right: -30px;">
        <a href="{{ route('products.show', ['id'=>$product->id, 'name'=>$product->slug]) }}">

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
            <p class="condition" style="text-transform:capitalize;">Status: {{$product->status}}</p>


            {{-- <p class="hide_for_large">{{ str_limit($product->description, $limit = 20, $end = '...') }}</p> --}}
            <p class="hide_for_sm">{{ str_limit($product->description, $limit = 100, $end = '...') }}</p>
            <div class="">
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
         {{-- {{ $products->links() }} --}}
      </div>
@endsection
