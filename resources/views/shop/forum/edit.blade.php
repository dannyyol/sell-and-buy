
@extends('layout.layout')

@section('content')
  <link rel="stylesheet" href="{{asset('/css/richtext.min.css')}}">
    <script src="{{ asset('/js/js/richtext.js') }}"></script>
    <script src="{{ asset('/js/jquery.richtext.min.js') }}"></script>
<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-md-12">
      @include('shop.forum.partials.error')
      @include('shop.forum.partials.success')
    </div>

  </div>

  <div id="navigation">
      <a href="{{ route('forum.create') }}" class="btn float-right create_post_sm create_post_lg">Create Post</a>
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
        <a href="{{ route('forum.index')}}">Forum</a>

      </li>
      <li> > </li>
      <li> 
        <a href="{{route('forum.edit', $thread->id)}}">Edit Post</a>
       </li>
      <li> > </li>
      <li><a href="{{ route('forum.create') }}" class="create_post_hide_lg"> Create Post</a></li>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-8 col-md-8 mb-2">
      <div class="card">
        <div class="card-body">
          <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;">
          <div class="form float-right" style="width:85%;">
            <h4>Update Post</h4>

            <form class="form-vertical" action="{{ route('forum.update', $thread->id) }}" method="post" role="form" id="create-post-form" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Enter subject" name ="subject" value="{{ $thread->subject}}" style="background-color:rgba(128,128,128, 0.1);border:none;">
              </div>

              <div class="form-group">
               
                  {{-- <select name="threadcategories" id="my-select" class="custom-select">
                      @foreach($td as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select> --}}
                
                  <div class="form-group">
                    {{ Form::select('tdCategory_id', $td, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Category']) }}
                  </div> 
                    {{-- todo add from db--}
                {{-- {{ Form::select('td_category_id', $td_categories, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Category']) }} --}}

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
              <div class="form-group">
                <textarea class="content" name="thread" placeholder="Enter post">{{ $thread->thread}}</textarea>
                  <script>
                  $('.content').richText();
                  </script>
                {{-- <textarea type="text" class="form-control" id="" placeholder="Enter post" name="thread" value="" style="background-color:rgba(128,128,128, 0.1);border:none;">{{ $thread->thread}}</textarea> --}}
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary primary_button float-right">Update Post</button>
            </form>
          </div>

      </div>
        </div>

      </div>
      @include('shop.forum.partials.thread_lists')
    </div>
  </div>

</div>
<script>
$(function () {
    $('#tag').selectize();
})

$(document).ready(function() {

  $(".btn-success").click(function(){
      var html = $(".clone").html();
      $(".increment").after(html);
  });

  $("body").on("click",".btn-danger",function(){
      $(this).parents(".control-group").remove();
  });

});

</script>
@endsection
