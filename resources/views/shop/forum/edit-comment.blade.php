
@extends('layout.layout3')

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
            <h4>Edit Comment</h4>

            <form class="form-vertical" action="{{ route('comment.update', $comment->id) }}" method="post" role="form" id="create-post-form" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="form-group" style="height:150px;background-color:rgba(128,128,128, 0.1);padding:30px;">
                  <p style="color:rgba(105,105,105, 0.5);">Reply</p>
                    <fieldset class="form-group">
                      <textarea class="form-control" id="exampleTextarea" rows="2" name='body' style="border-radius:0px;background-color:inherit;border:none;">{{$comment->body}}</textarea>
                    </fieldset>
              </div>

              {{-- image upload --}}
              <div class="input-group control-group increment" >
                <input type="file" name="filename[]" class="form-control form-control-sm">
                  <button class="btn btn-sm btn-success" type="button" style="border-radius:0px;"><i class="fa fa-plus"></i></button>
              </div>
              <div class="clone hide">
              <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="filename[]" class="form-control form-control-sm">
                  <button class="btn btn-sm btn-danger" type="button" style="border-radius:0px;"><i class="fa fa-remove"></i></button>
              </div>
            </div>
        {{-- end --}}
        <br />
              <button type="submit" name="submit" class="btn btn-sm btn-primary float-right">Update Post</button>
            </form>
          </div>

      </div>
        </div>

      </div>
      @include('shop.forum.partials.thread_lists')
    </div>
  </div>

</div>
<script type="text/javascript">
// delete
$(document).ready(function() {

  $(".btn-success").click(function(){
      var html = $(".clone").html();
      $(".increment").after(html);
  });

  $("body").on("click",".btn-danger",function(){
      $(this).parents(".control-group").remove();
  });

});
// end delete

</script>
@endsection
