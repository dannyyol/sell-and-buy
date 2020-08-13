@extends('admin.layout.admin')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>Add Product</h3>
      <div class="row">
        <!-- using composer require laravelcollective/html-->
        {!! Form::open(['route'=> 'product.store', 'method' => 'POST', 'files'=>true]) !!}
        {{ csrf_field () }}
        <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('price', 'Price') }}
          {{ Form::text('price', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('description', 'Description') }}
          {{ Form::text('description', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('size', 'Size') }}
          {{ Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'], null, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('category_id', 'Categories') }}
          {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
        </div>

        <div class="form-group">
          {{ Form::label('school_id', 'Schools') }}
          {{ Form::select('school_id', $schools, null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
        </div>
{{--    <div class="form-group">
    {{ Form::label('categories', 'Categories') }}
    {{ Form::select('categories', ['phone'=>'Phone', 'laptop'=>'Laptop', 'hostel'=>'Hostel','books/materials'=>'Book/Materials','electronics'=>'Electronics', 'others'=>'Others'], null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
  </div>--}}
        <div class="form-group">
          {{ Form::label('image', 'Image') }}
          {{ Form::file('image', array('class'=>'form-control')) }}
          <br />
          {{ Form::submit('create', array('class'=>'btn btn-primary')) }}
        </div>
        {!! Form::close() !!}
      </div>
    </div>

  </div>

@endsection
