@extends('layout/layout3')

@section('content')

<div class="container">
  <h4>
    
</h4>

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
        <a href="{{ route('product.create') }}" class="btn float-right create_post_sm create_post_lg">Create Post</a>
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
          <a href="">Adverts</a>

        </li>
        <li> > </li>
        <li> 
          {{-- @foreach ($products as $product) --}}
          <a href="{{ route('school.show_frontend', ['id'=>$school->id, 'school'=>$school->slug]) }}">
              {{$school->name}}
            </a>
          {{-- @endforeach --}}
        
        </li>
        
        <li>
          <a href="" class="create_post_hide_lg"> 
            Create Post
          </a>
        </li>
      </div>
    </div>

    <br>

<br>

@forelse ($products as $product)
  <div class="card mb-3 card_product" style="border:0px;">
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
          <p class="condition">Status: Used</p>


          {{-- <p class="hide_for_large">{{ str_limit($product->description, $limit = 20, $end = '...') }}</p> --}}
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
  <div class="d-flex justify-content-center">
    <h6> Sorry! No Advert in School</h6>
 </div>
@endforelse
   <div class="d-flex justify-content-center">
     {{ $products->links() }}
  </div>
   </div>

@endsection
