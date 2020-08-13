@extends('admin.layout.admin')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>Edit Product</h3>
      <div class="row">
        <!-- using composer require laravelcollective/html-->
        {{Form::open(array('route' => array('product.update', $products->id, 'files'=>true)))}}
        {{ csrf_field () }}
        {{ method_field('PATCH') }}
        <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', $products->name, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('price', 'Price') }}
          {{ Form::text('price', $products->price, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('description', 'Description') }}
          {{ Form::text('description', $products->description, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('size', 'Size') }}
          {{ Form::select('size', ['small'=>'Small', 'medium'=>'Medium', 'large'=>'Large'], $products->size, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('category_id', 'Categories') }}
          {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
        </div>

        <div class="form-group">
          {{ Form::label('school_id', 'Schools') }}
          {{ Form::select('school_id', $schools, null, ['class'=>'form-control', 'placeholder'=>'Select']) }}
        </div>

        <div class="form-group">
          {{ Form::label('image', 'Image') }}
          {{ Form::file('image', array('class'=>'form-control')) }}
          <br />
          {{ Form::submit('Updated', array('class'=>'btn btn-primary')) }}
        </div>
        {!! Form::close() !!}
      </div>
    </div>

  </div>

@endsection
