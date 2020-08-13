{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



 @extends('layout.layout')

 @section('content')
   <br />   <br />
 <div class="container">
 <div class="card card_con bg-light mx-auto">
 <article class="card-body mx-auto">
 	<h4 class="card-title mt-3 text-center">Create Account</h4>
 	<p class="text-center">Get started with your free account</p>

 <form method="POST" action="{{ route('register') }}">
         @csrf
 	<div class="form-group input-group">
 		<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
 		 </div>
       <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"placeholder="Enter username" name="name" value="{{ old('name') }}" required autofocus>

       @if ($errors->has('name'))
           <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('name') }}</strong>
           </span>
       @endif
     </div> <!-- form-group// -->
     <div class="form-group input-group">
     	<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
 		 </div>
         <input name="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Email address" type="email" value="{{ old('name') }}" required autofocus>

 				@if ($errors->has('email'))
 						<span class="invalid-feedback" role="alert">
 								<strong>{{ $errors->first('email') }}</strong>
 						</span>
 				@endif
     </div> <!-- form-group// -->
     {{-- <div class="form-group input-group">
     	<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
 		</div>
 		<select class="custom-select" style="max-width: 120px;">
 		    <option selected="">+971</option>
 		    <option value="1">+972</option>
 		    <option value="2">+198</option>
 		    <option value="3">+701</option>
 		</select>
     	<input name="school" id="school" class="form-control" placeholder="Enter Your School Name" type="text" value="{{ old('') }}" required>
 			@if ($errors->has(''))
 					<span class="invalid-feedback" role="alert">
 							<strong>{{ $errors->first('') }}</strong>
 					</span>
 			@endif
     </div> <!-- form-group// --> --}}
     {{-- <div class="form-group input-group">
     	<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
 		</div>
 		<select class="form-control">
 			<option selected=""> Select job type</option>
 			<option>Designer</option>
 			<option>Manager</option>
 			<option>Accaunting</option>
 		</select>
 	</div> <!-- form-group end.// --> --}}
     <div class="form-group input-group">
     	<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
 		</div>
 		<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Create password" name="password" required>

 		@if ($errors->has('password'))
 				<span class="invalid-feedback" role="alert">
 						<strong>{{ $errors->first('password') }}</strong>
 				</span>
 		@endif

     </div> <!-- form-group// -->
     <div class="form-group input-group">
     	<div class="input-group-prepend">
 		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
 		</div>
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
     </div> <!-- form-group// -->
     <div class="form-group">
         <button type="submit" class="btn btn-success btn-block"> {{ __('Register') }}  </button>
     </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="{{route('login')}}">Log In</a> </p>
 </form>
 </article>
 </div> <!-- card.// -->

 </div>
 <!--container end.//-->

@endsection
