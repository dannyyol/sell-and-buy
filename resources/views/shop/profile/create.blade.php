@extends('layout.layout_profile')
@section('content')

<br /><br /><br />
  <div class="container profile_page">
      <div class="row">
        @include('shop.profile.success')
    		<div class="col-sm-10">
          <center>
          <h1>{{$user->name}}'s Profile</h1>
        </center>
        </div>

      <div class="row">
    	<div class="col-sm-4"><!--left col-->


          @if ($user->UserProfile->photo)
            <div class="text-center">

                <img src="{{ url('images/profile', $user->userprofile->photo) }}" class="img-circle img-thumbnail" alt="{{$user->userprofile->photo}}">



          @else
            <div class="text-center">
              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
          @endif
          <h6>Upload a different photo...</h6>
          <input type="file" class="text-center center-block file-upload">
        </div></hr><br>

        @include('shop.profile.partials.profile_sidebar')
      	<div class="col-sm-8">

              {{-- <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                  <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                  <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
                </ul> --}}


            <div class="tab-content">
              <div class="tab-pane active" id="home">
                  <hr>
                    <form class="form" action="{{ route('profile.update',auth()->user()) }}" method="post" id="registrationForm" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{-- {{ method_field('PUT') }} --}}
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="first name" title="enter your first name if any." value="{{ $user->userprofile->firstname }}">
                            </div>
                        </div>




                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter phone" title="enter your phone number if any." value="{{ $user->userprofile->mobile }}">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                              <label for="lastname"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="last name" title="enter your last name if any." value="{{ $user->userprofile->lastname }}">
                            </div>
                        </div>



                        {{-- <div class="form-group">
                            <div class="col-xs-6">
                               <label for="level"><h4>school</h4></label>
                                <input type="text" class="form-control" name="school" id="school" placeholder="enter mobile number" title="enter your school if any.">
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-xs-6">
                               <label for="level"><h4>Level</h4></label>
                                <input type="text" class="form-control" name="level" id="level" placeholder="enter mobile number" title="enter your level number if any." value="{{ $user->userprofile->level }}">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" title="enter your email." value="{{ $user->email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-xs-6">
                              <label for="school"><h4>School</h4></label>
                              <select class="form-control" id="" name='school'>
                                <option>{{ $user->userprofile->school }}</option>
                                @foreach ($schools as $school)
                                <option>{{ $school->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="photo"><h4>Photo</h4></label>
                                <input type="file" class="form-control" name="photo" id="photo" placeholder="birthday">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="birthday"><h4>Birthday</h4></label>
                                <input type="text" class="form-control" name="birthday" id="birthday" value="{{ $user->userprofile->birthday }}" placeholder="birthday" title="enter your date of birth.">
                            </div>
                        </div>
                        <div class="form-group">
                          @php
                          $values = explode(",", $user->userprofile->gender);
                        @endphp

                            <div class="col-xs-6">
                              <label for="email"><h4>Gender</h4></label>
                              <br>
                              <label class="checkbox-inline"><input type="checkbox" name ="option[]" value="male" @if(in_array("male", $values)) checked @endif>Male</label>
                              <label class="checkbox-inline"><input type="checkbox" name ="option[]" value="female" @if(in_array("female", $values)) checked @endif>Female</label>
                            </div>
                        </div>







                        <div class="form-group">
                             <div class="col-xs-12">
                                  <br>
                                	<button class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                                 	<button class="btn btn-md" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                  {{-- <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit</button> --}}
                              </div>
                        </div>


                	</form>

                <hr>

               </div><!--/tab-pane-->




                <br />
                <hr>

                <div class="col-md-9 col-sm-8 collapse" id = 'notify'>
                  <div class="col-xs-12" style="margin-top:30px;">
                    <h4 align="center">Unread Notification:</h4>
                    <ul class="list-unstyled">
                      @forelse (auth()->user()->unreadnotifications as $notification)

                        <li align="center">@include('shop.forum.partials.'.snake_case(class_basename($notification->type)))</li>
                      @empty
                        <li>No Unread Notifications</li>
                      @endforelse
                    </ul>
                  </div>

                </div>

              <div class="col-md-9 col-sm-8 collapse" id = 'post'  style="margin-top:20px;">
                <div class="col-xs-12" style="margin-top:20px;">


                  <h4 align="center">{{ $user->name }}'s Latest Post</h4>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Post</th>
                        <th>Date Posted</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($threads as $threads)
                        <tr>
                          <td>
                            <a href="{{ route('forum.show', $threads->id) }}"> {{ $threads->subject }}</a>
                          </td>
                          <td>{{$threads->updated_at->diffForHumans()}}</td>

                        </tr>
                      @empty
                        <h4>{{ $user->name }} has no post</h4>

                      @endforelse

                    </tbody>
                  </table>
                </div>




                </div>{{-- col-md-9 --}}

                <div class="col-md-9 col-sm-8  collapse" id="advert">
                  <div class="col-xs-12" style="margin-top:20px;">
                    <h4 align="center">{{ $user->name }}'s Adverts</h4>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Advert</th>
                          <th>Date Posted</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($product as $product)
                          <tr>
                            <td>
                              <a href="{{ route('products.show', $product->id) }}"> {{ $product->name }}</a>
                            </td>
                            <td>{{$product->updated_at->diffForHumans()}}</td>

                            <td>
                              <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-default btn-sm">Edit</a>

                                  <button type="submit" class="btn btn-default btn-sm">
                                    Delete
                                  </button>
                              </form>

                            </td>

                          </tr>
                        @empty
                          <h4>{{ $user->name }} has no advert</h4>
                        @endforelse

                      </tbody>
                    </table>
                  </div>

            </div><!--/tab-content-->



          </div><!--/col-9-->
          @foreach ($feeds as $feed)
            @include('shop.forum.feeds.'.snake_case(class_basename($feed->type)))



          @endforeach


      </div><!--/row-->
</div>
    </div>
</div>
<script type="text/javascript">
$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});

</script>
  @endsection
