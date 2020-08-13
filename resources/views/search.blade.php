@extends('layout.search-layout')
@section('content')

<div class="container" style="margin-top:30px;"><br />
  <h4 style="color:rgb(105, 105, 105);">
    <?php if(isset($msg)){ echo $msg; } else{?> Features Item<?php }?>
  </h4>
  <br>
  @if(isset($data))

  @foreach ($data as $product)

  <div class="card mb-3">
    <div class="col-md-10 float-left" style="padding-top:10px;padding-bottom:10px;">
      <a href="{{route('products.show', $product->id)}}">
         <img class="card-img-top image-resize" src="{{ url('images', $product->image) }}" alt="{{$product->name}}" style="">
      </a>
      <div class="float-right product_content1" style="">
        <h5 class="card-title">{{ $product-> name}}</h5>
        <p class="float-right" style="color: rgba(0, 230, 64, 1);font-weight:bold;font-size:18px;">#{{$product->price}}</p>
        <p class="hide_for_large">{{ str_limit($product->description, $limit = 20, $end = '...') }}</p>

        <p class="hide_for_sm">{{ str_limit($product->description, $limit = 60, $end = '...') }}</p>
        <p class="float-left card-text2" style="color:rgb(105,105,105);padding-top:-15px;">
        <small class="text-muted"></small></p>
      </div>
    </div>
  </div>




  @endforeach
  <div class="d-flex justify-content-center">
    {!! $data->render() !!}
  </div>
@else
  <div class="d-flex justify-content-center">
    <h3>  {{ $message }}</h3>
  </div>

@endif

</div>
@endsection
