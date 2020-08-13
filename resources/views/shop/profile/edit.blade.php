@extends('layout.layout_profile')
@section('content')
<br /><br /><br />
        <div class="container profile_page">
            <div class="row">


              @include('shop.profile.success')

          		<div class="col-sm-10">
                <center>
              <h1>{{$user->name}}'s Profile</h1>
            </center></div>
            	{{-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
            </div> --}}
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


            @php
            $values = explode(",", $user->userprofile->gender);
          @endphp
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
                        <form class="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{-- {{ method_field('PUT') }} --}}
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="first name" title="enter your first name if any." value="{{ $user->userprofile->firstname }}" disabled>
                                </div>
                            </div>




                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>Mobile</h4></label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter phone" title="enter your phone number if any." value="{{ $user->userprofile->mobile }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                  <label for="lastname"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="last name" title="enter your last name if any." value="{{ $user->userprofile->lastname }}" disabled>
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
                                    <input type="text" class="form-control" name="level" id="level" placeholder="enter mobile number" title="enter your level number if any." value="{{ $user->userprofile->level }}" disabled>
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
                                  <select class="form-control" id="" disabled>

                                    <option name='school' value="">{{ $user->userprofile->school }}</option>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="photo"><h4>Photo</h4></label>
                                    <input type="file" class="form-control" name="photo" id="photo" value="{{ $user->userprofile->photo }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="birthday"><h4>Birthday</h4></label>
                                    <input type="text" class="form-control" value="{{ $user->userprofile->birthday }}" id="birthday" placeholder="" title="enter your date of birth." disabled>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                  <label for="email"><h4>Gender</h4></label>
                                  <br>
                                  <label class="checkbox-inline"><input type="checkbox" name ="option[]" value="male" @if(in_array("male", $values)) checked @endif disabled>Male</label>
                                  <label class="checkbox-inline"><input type="checkbox" name ="option[]" value="female" @if(in_array("female", $values)) checked @endif disabled>Female</label>
                                </div>
                            </div>







                            <div class="form-group">
                                 <div class="col-xs-12" style="margin-top:10px;">
                                   {{-- @php
                                     dd(auth()->user()->id == $user->userprofile->user_id);
                                   @endphp --}}
                                   @guest
                                     @else
                                       @if (auth()->user()->id == $user->userprofile->user_id)
                                         <a href="{{ route('profile.edit',auth()->user()) }}" class="btn btn-md btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit</a>

                                       @endif
                                   @endguest

                                  </div>
                            </div>


                      </form>
                      <hr>

                     </div><!--/tab-pane-->

                     <div class="tab-pane" id="messages">

                       <h2></h2>

                       <hr>

                      </div>

                      </div><!--/tab-pane-->
                      <br />
                      <hr>

                    <div class="col-md-9 col-sm-8 collapse" id = 'notify'>
                      <div class="col-xs-12" style="margin-top:30px;">
                        <h4 align="center">Unread Notification:</h4>
                        <ul class="list-unstyled">
                          @if (auth()->user())
                            @forelse (auth()->user()->unreadnotifications as $notification)

                              <li align="center">@include('shop.forum.partials.'.snake_case(class_basename($notification->type)))</li>
                            @empty
                              <li>No Unread Notifications</li>
                            @endforelse
                          @endif

                        </ul>
                      </div>

                    </div>
                    <div class="col-md-9 col-sm-8 collapse" id = 'post'  style="margin-top:20px;">
                      <div class="col-xs-12" style="margin-top:30px;">


                        <table class="table">
                          <h4 align="center">{{ $user->name }}'s Latest Post</h4>
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

                      <div class="col-md-9 col-sm-8 collapse" id="advert">
                          <div class="col-xs-12" style="margin-top:30px;">
                          <h4 align="center">{{ $user->name }}'s adverts</h4>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Advert</th>
                                <th>Date Posted</th>
                                @guest

                                @else
                                  @if (auth()->user()->id == $user->userprofile->user_id)
                                    <th>Action</th>
                                  @endif
                                @endguest
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($product as $product)
                                <tr>
                                  <td>
                                    <a href="{{ route('products.show', $product->id) }}"> {{ $product->name }}</a>
                                  </td>
                                  <td>{{$product->updated_at->diffForHumans()}}</td>
                                  @guest
                                    @else
                                    @if (auth()->user()->id == $user->userprofile->user_id)
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
                                    @endif
                                  @endguest


                                </tr>
                              @empty
                                <td align="center"><b> {{ $user->name }} has no advert yet !</b></td>



                                </div>

                            @endforelse

                          </tbody>
                        </table>




                  </div><!--/tab-content-->


                </div><!--/col-9-->


              </div>

            </div><!--/row-->
          </div>
        </div>




@endsection
