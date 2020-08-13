@extends('layout.layout3')

@section('content')
  <div class="container">
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
              <a href="">Product</a>
          
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
          <a href="{{route('products.create')}}" class="create_post_hide_lg"> 
              Post Advert
            </a>
          </li>
        </div>
      </div>
      <br>
      @include('shop.forum.partials.error')
      <br>
    <div class="row d-flex justify-content-left">
      <div class="col-md-8">

          <!-- using composer require laravelcollective/html-->
          {!! Form::open(['route'=> 'product.store', 'method' => 'POST', 'files'=>true]) !!}
          {{ csrf_field () }}
          <div class="form-group">
            {{-- {{ Form::label('name', 'Name') }} --}}
            {{ Form::text('name', null, array('class'=>'form-control form-control-sm','placeholder'=>'Name')) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('price', 'Price') }} --}}
            {{ Form::text('price', null, array('class'=>'form-control form-control-sm', 'placeholder'=>'Price')) }}
          </div>


          <div class="form-group">
            {{-- {{ Form::label('size', 'Size') }} --}}
            {{-- {{ Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'], null, ['class'=>'form-control form-control-sm']) }} --}}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('category_id', 'Categories') }} --}}
            {{ Form::select('category_id', $categories, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Category']) }}
          </div>

          <div class="form-group">
              {{ Form::select('negotiate', ['negotiable'=>'Negotiable', 'non-negotiable'=>'Non negotiable'], null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select']) }}
          </div>

          <div class="form-group">
              {{ Form::select('status', ['used'=>'Used', 'new'=>'New'], null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Status']) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('school_id', 'Schools') }} --}}
            {{ Form::select('school_id', $school, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select School']) }}
          </div>
          <div class="form-group">
            {{-- {{ Form::label('description', 'Description') }} --}}
            {{ Form::textarea('description', null, array('class'=>'form-control form-control-sm','placeholder'=>'Description', 'style'=>'height:150px;')) }}
          </div>
  {{--    <div class="form-group">
      {{ Form::label('categories', 'Categories') }}
      {{ Form::select('categories', ['phone'=>'Phone', 'laptop'=>'Laptop', 'hostel'=>'Hostel','books/materials'=>'Book/Materials','electronics'=>'Electronics', 'others'=>'Others'], null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
    </div>--}}
          <div class="form-group">
            {{-- {{ Form::label('image', 'Image') }} --}}
            {{-- {{ Form::file('image', array('class'=>'form-control')) }} --}}


            <input type="file" name="filename[]" class="form-control form-control-sm">
            <small class="text-muted">First image will be used for advert display.</small>
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <br />
            <style>
            
            </style>
            {{ Form::submit('Create', array('class'=>'btn btn-primary primary_button', 'style'=>'float:right;')) }}
          </div>
          {!! Form::close() !!}
        </div>
    </div>
  </div>

@endsection
