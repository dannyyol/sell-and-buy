@extends('layout.layout3')

@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        @include('shop.forum.partials.error')
        <h3>Edit Product</h3>

          <!-- using composer require laravelcollective/html-->
          {{-- <form class="form" action="{{ route('profile.store',auth()->user()) }}" method="post" id="registrationForm" enctype="multipart/form-data"> --}}
          {{Form::open(array('route' => array('product.update', $products->id), 'files'=>true))}}
          {{ csrf_field () }}
          {{ method_field('PATCH') }}
          <div class="form-group">
            {{-- {{ Form::label('name', 'Name') }} --}}
            {{ Form::text('name', $products->name, array('class'=>'form-control form-control-sm', 'placeholder'=>'Name')) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('price', 'Price') }} --}}
            {{ Form::text('price', $products->price, array('class'=>'form-control form-control-sm', 'placeholder'=>'Price')) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('size', 'Size') }} --}}
            {{ Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'], $products->size, ['class'=>'form-control form-control-sm']) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('category_id', 'Categories') }} --}}
            {{ Form::select('category_id', $categories, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Category']) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('school_id', 'Schools') }} --}}
            {{ Form::select('school_id', $school, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select School']) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('description', 'Description') }} --}}
            {{ Form::textarea('description', $products->description, array('class'=>'form-control form-control-sm', 'placeholder'=>'Description', 'style'=>'height:150px;')) }}
          </div>

          <div class="form-group">
            {{-- {{ Form::label('image', 'Image') }} --}}
            {{-- {{ Form::file('image', array('class'=>'form-control')) }} --}}
            {{-- <input type="file" class="form-control" name="image" id="image" placeholder=""> --}}
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <small class="text-muted">First image will be used for advert display.</small>
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <input type="file" name="filename[]" class="form-control form-control-sm">
            <br />
            {{ Form::submit('Updated', array('class'=>'btn btn-primary', 'style'=>'float:right;')) }}
          </div>
          {!! Form::close() !!}

      </div>

    </div>
  </div>


@endsection
