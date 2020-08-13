@extends('layout.layout')

@section('content')
  <div class="container">
    <br><br><br>
    <div class="row">
      <div class="col-md-12">
        <div class="col-lg-7 offset-lg-3">

          <h3>Shipping Details</h3>
          {!! Form::open(['route' => 'address.store', 'method'=>'post']) !!}
          {{ csrf_field() }}
          <div class="form-group">
            {{ Form::label('addressline', 'Address Line') }}
            {{ Form::text('addressline', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('state', 'State') }}
            {{ Form::text('state', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('zip', 'Zip') }}
            {{ Form::text('zip', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('country', 'Country') }}
            {{ Form::text('country', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::label('phone', 'Phone Number') }}
            {{ Form::text('phone', null, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            {{ Form::submit('Proceed To Payment', array('class'=>'btn btn-success float-right')) }}

            {!! Form::close() !!}

            <br><br>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection
