
@extends('layout.layout2')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @include('shop.forum.partials.error')
      @include('shop.forum.partials.success')
    </div>

  </div>

  <div class="row">
    <div class="col-md-8 col-md-8 mb-2">
      <div class="card">
        <div class="card-body">
          <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;">
          <div class="form float-right" style="width:90%;">
            <h4>Reply</h4>

            <form class="form-vertical" action="{{route('replycomment.store', $comment->id)}}" method="post" role="form" id="create-post-form">
              {{ csrf_field() }}

                <div class="form-group" style="height:150px;background-color:rgba(128,128,128, 0.1);padding:30px;">
                  <p style="color:rgba(105,105,105, 0.5);">Reply</p>
                    <fieldset class="form-group">
                      <textarea class="form-control" id="exampleTextarea" rows="2" name='body' style="border-radius:0px;background-color:inherit;border:none;">{{$reply->body}}</textarea>
                    </fieldset>
              </div>
              <button type="submit" name="submit" class="btn btn-success float-right">Post Reply</button>
            </form>
          </div>

      </div>
        </div>

      </div>
      @include('shop.forum.partials.thread_lists')
    </div>
  </div>

</div>

@endsection
