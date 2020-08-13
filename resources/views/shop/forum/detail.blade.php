@extends('layout.layout')


@section('content')
{{-- <div class="top_menu p-3" style="margin-bottom:40px;width:100%; height:70px;background-color:#fff;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
  <input type="search" name="" id="" class="" style="width:300px;" placeholder="Enter Search">
  <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> </button>
  </div> --}}
  
  <div class="container">
    <br><br><br>
    <div class="row">
      <div class="col-md-12">
        @include('shop.forum.partials.success')
      </div>
    </div>

    @guest
      <div class="forum_guest_login alert alert-primary alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
        <strong><a href="{{route('login')}}">Login</a></strong> to be able to comment <a href="{{route('register')}}" class="alert-link">. Click here</a> if you dont have an account.
      </div>
    @endguest
    
    {{-- <input type="text" value= "{{ $thread->visit_count }}" id="postVisitCount"> --}}
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
          @foreach ($cate as $cate)
          <a href="{{ route('forum.index', ['id'=>$cate->id, 'category' => $cate->slug] )}}">{{$td_category->name}}</a>
          @endforeach 
        </li>
          <li> > </li>
          <li>{{$thread->subject}}</li>
          <li class="create_post_hide_lg">></li>
          <li><a href="{{ route('forum.create') }}" class="create_post_hide_lg"> Create Post</a></li>
        </div>
      </div>

    <br />
    <style>
    #circle{
      background: green;
      width: 11px;
      height: 11px;
      border-radius: 50%;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      position: absolute;
    }
    #circle2{
      background: #fff;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      position: absolute;

    }
    </style>
    <div class="row">
        @include('shop.forum.partials.thread_lists')
      <div class="col-md-8">
        <div class="card mb-3 forum-card-margin-top" style="border:0px;">
          <ul class="list-group">
            <div class="card-header list-group-item-heading d-flex justify-content-left">
                <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;"> 
                @if ($thread->user->isOnline())
            
                <span id="circle2">
                  <span id="circle"></span>
                </span>
                @endif
                <h6 style="padding-top:10px;padding-left:30px;">{{$thread->subject}}</h6>
                
              </a>

          {{-- @include('shop.forum.bbcode_function') --}}

          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">

              <p align="justify" style="color:rgb(105,105,105);">{{$thread->thread}} <?php //echo bbcode_to_html($thread->thread); ?></p>
              @foreach ($thread->thread_images as $image)
                @php $filenames = json_decode($image->filename); @endphp
                @foreach ($filenames as $singlefile)

                <img class="" src="{{ url('images/forum', $singlefile) }}" alt="" style="max-width:70%;max-height:50%;padding:5px;"/>
                @endforeach
              @endforeach
              <br />
              <footer class="blockquote" style="color:rgba(105,105,105,0.7);font-size:12px;"> 
                <div class="btn-group">
                  <button style="" class="btn btn-info btn-sm {{$thread->isLiked()?"liked":""}}" onclick="likeItthread('{{$thread->id}}',this)"><span class="fa fa-heart" style="font-size:12px;">
                  </span></button>
                  <button class="btn btn-sm btn-default" id="{{$thread->id}}-count1" >{{$thread->likes()->count()}}</button>
                </div>
                <a href="#comment">
                  <i class="fa fa-reply" style="margin-left:20px;margin-right:20px;"></i>
                </a>
                <i class="far fa-clock"  style=""></i> Posted on: {{ $thread->updated_at->format('j F @ h:i')}} by <a style="color:inherit;" href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a>



                <div class="actions d-flex float-right">
                    @can('update', $thread)
                      <a href="{{ route('forum.edit', $thread->id) }}" class="btn btn-info btn-sm" style="margin-right:10px;"> <i class="fa fa-edit"></i> </a>
                      <form action=""{{route('forum.destroy', $thread->id)}}"" method="POST" class="inline-it">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {{-- <input type="submit" name="" value="Delete" class="btn btn-sm btn-danger"> --}}
                        <button type="submit" class="btn btn-sm btn-delete" style=""><i class="fas fa-trash-alt"></i></button>
                      </form>
                    @endcan
                </div>
                
              </footer>
            </blockquote>
          </div>


        </div>{{-- card --}}

        <div class="d-flex justify-content-center" style="margin:auto;text-align:center;">
          {{ $commentPaginate->links() }}
        </div>

        {{-- kkkkkkkkkkkkkkkkkkkkkkkkk
        @foreach ($imageComment as $filenames)
          @php
            dd($filenames);
          @endphp
          @php $filenames = json_decode($filenames->filename); @endphp
          @foreach ($filenames as $singlefile)

          <img class="" src="{{ url('images/forum/comment', $singlefile) }}" alt="" />
          @endforeach
        @endforeach --}}
{{-- comment section --}}
@foreach ($commentPaginate as $comment)
        <div class="card mb-3"  style="border:0px;">
          <ul class="list-group">
          <div class="card-body">
            <blockquote class="blockquote mb-0">
                @if ($comment->user->isOnline())
                <span id="circle2">
                  <span id="circle"></span>
                </span>
              @endif
            <img src="{{ asset("static/images/avatar.png") }}" class="float-left" alt="" style="width:45px;height:45px;border-radius:22.5px;">
                
              <p align="justify" style="padding-left:60px;color:rgb(105,105,105);"> {{ $comment->body }}</p>
              @if ($comment->filename)
                @php
                  $filename = json_decode($comment->filename);
                @endphp
                @foreach ($filename as $element)
                  <img class="" src="{{ url('images/comment', $element) }}" alt="" style="max-width:70%;max-height:50%;padding:5px;"/>
                @endforeach
              @else
              @endif
              <br />
              <footer class="blockquote" style="color:rgba(105,105,105,0.7);font-size:12px;"> 
                <div class="btn-group">
                  <button style="" class="btn btn-info btn-sm {{$comment->isLiked()?"liked":""}}" onclick="likeIt('{{$comment->id}}',this)"><span class="fa fa-heart" style="font-size:12px;">
                  </span></button>
                  <button id="{{$comment->id}}-count" class="btn btn-sm btn-default">{{$comment->likes()->count()}}</button>
                </div>
             @if (Auth::user())


                <a href="#{{$comment->id}}" data-toggle="collapse">
                 <i class="fa fa-reply" style="margin-left:20px;"></i>
              </a>
            @endif

                <i class="far fa-clock"  style="margin-left:20px;"> </i> Commented on: {{ $thread->updated_at->format('j F @ h:i')}} by
                <i class="fa fa"></i> <a style="color:inherit;" href="{{route('user_profile',$comment->user->name)}}">{{$comment->user->name}}</a>
               
                <div class="actions d-flex float-right">

                @can('update',$comment)
                  <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-info btn-sm" style="margin-right:10px;"> <i class="fa fa-edit"></i> </a>
                  {{-- <a href="" class="btn btn-info btn-md" style="margin-right:10px;">Edit</a> --}}
                  {{-- modal --}}


                  <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="inline-it">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-delete" style=""><i class="fas fa-trash-alt"></i></button>

                  </form>
              @endcan

                </div>
                <br /><br />
            
              </footer>
            </blockquote>

          </div>



        </div>

        {{-- reply to comment form --}}

        <div class="reply-form collapse" id="{{$comment->id}}">

            <div class="card mb-3" style="border-bottom: none;border-left: none;border-right: none;">
              <div class="card-body">
                  @if ($comment->user->isOnline())
                    <span id="circle2">
                      <span id="circle"></span>
                    </span>
                  @endif
                <img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;">
                <div class="form float-right" style="width:90%;">
                  <legend>Create Reply</legend>

                  <form class="form-vertical" action="{{route('replycomment.store', $comment->id)}}" method="post" role="form" id="create-post-form" enctype="multipart/form-data">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <style media="screen">
                           input:hover{
                            color:red;

                          }
                          quote{
                            color:red;
                          }
                        </style>

                          <fieldset class="form-group">
                            <textarea class="form-control replytocomment" id="exampleTextarea" rows="1" name='body' placeholder="Type your message here" style="border-radius:0px;border-left:0px;border-right:0px;border-top:0px;border-bottom:4px solid #009900; background-color:inherit;"></textarea>
                          </fieldset>

                          {{-- image upload --}}
                          <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control form-control-sm">
                              <button class="btn btn-sm btn-success" type="button" style="border-radius:0px;"><i class="fa fa-plus"></i></button>
                          </div>
                          <div class="clone hide">
                          <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control form-control-sm image_upload">
                              <button class="btn btn-sm btn-danger" type="button" style="border-radius:0px;"><i class="fa fa-remove"></i></button>
                          </div>
                        </div>
                    {{-- end --}}
                    </div>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary float-right">Post Reply</button>
                  </form>
                </div>

            </div>
          </div>

        </div>{{-- end reply --}}



      @foreach ($comment->comments as $reply)

    {{-- reply comments --}}

        <div class="card bgQuote-card bg-light mb-3" style="margin-left:;" id= "one">
          <ul class="list-group">

          <div class="card-body">
            <blockquote class="blockquote mb-0">
                @if ($reply->user->isOnline())
                  <span id="circle2">
                    <span id="circle"></span>
                  </span>
                @endif
            <img src="{{ asset("static/images/avatar.png") }}" class="float-left" alt="" style="width:45px;height:45px;border-radius:22.5px;">

            <div class="card quote-card">
              <div class="card-body">
                  <p class="quote" style="font-size:0.6em;">Original Posted by - {{ $comment->user->name }}</p></small>
                  <p style="color:rgb(105,105,105);"> {{ $comment->body }}</p>
              </div>
            </div>

              <p class="quote-body" align="justify" style="">{{ $reply->body }}</p>
              {{-- @php
                dd($reply->filename);
              @endphp --}}
              <div class="reply-image">


              @if ($reply->filename)
                @php
                  $filename = json_decode($reply->filename);
                @endphp
                @foreach ($filename as $element)
                  <img class="" src="{{ url('images/comment', $element) }}" alt="" style="max-width:70%;max-height:50%;padding:5px;"/>
                @endforeach
              @else
              @endif
            </div>
                
               

              <footer style="color:rgba(105,105,105,0.7);font-size:12px;">
                {{-- <i class="fa fa-reply" style="margin-left:20px;margin-right:20px;"></i> --}}

                <div class="btn-group">
                  <button style="" class="btn btn-info btn-sm {{$reply->isLiked()?"liked":""}}" onclick="likeItReply('{{$reply->id}}',this)"><span class="fa fa-heart" style="font-size:12px;">
                  </span></button>
                  <button id="{{$reply->id}}-count" class="btn btn-sm btn-default">{{$reply->likes()->count()}}</button>
                </div>

                <i class="far fa-clock"  style=""></i> Replied on: {{ $reply->updated_at->format('j F @ h:i')}} by
                <i class="fa fa"></i>
                <a style="color:inherit;" href="{{route('user_profile',$reply->user->name)}}">
                  {{ $reply->user->name }}</a>


                  <div class="actions d-flex float-right">

                    {{-- replytocomment modal --}}
                    @can('update',$reply)
                  
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#{{$reply->id}}"  style="margin-right:5px;"> <i class="fa fa-edit"></i> </button>
                    <form action="{{ route('comment.destroy', $reply->id) }}" method="POST" class="inline-it">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-sm btn-delete" style=""><i class="fas fa-trash-alt"></i></button>
  
                    </form>

                    <div id="{{$reply->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
  
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <form action="{{ route('comment.update', $reply->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                              <fieldset class="form-group">
                                <textarea class="form-control" id="exampleTextarea" rows="2" name='body' style="width:100%;">{{$reply->body}}</textarea>
                              </fieldset>
  
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
  
  
  
                            </div>
  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" name="button">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" name="button">Save Changes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- end replytocomment modal--}}
                    {{-- <a href="" class="btn btn-info btn-md" style="margin-right:10px;">Edit</a> --}}
                    {{-- modal --}}
  
  
                    
  
                  @endcan
                  </div>
              </footer>
            </blockquote>

          </div>
        </div>
        @endforeach
        {{-- end reply comment --}}





      @endforeach
      {{-- end comment section --}}

              <div class="card mb-3" style="border:0px;">
                <ul class="list-group">

                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                  <img src="{{ asset("static/images/avatar.png") }}" class="float-left" alt="" style="width:45px;height:45px;border-radius:22.5px;">

                  <div class="comment-form" style="padding-left:60px;" id="comment">
                    <form action= "{{route('threadcomment.store', ['id' => $thread->id, 'title' => $thread->slug])}}" method="post" role="form" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group" style="height:150px;background-color:rgba(128,128,128, 0.1);padding:30px;">
                        <p style="color:rgba(105,105,105, 0.5);"><small>Reply</small></p>
                          <fieldset class="form-group">
                            <textarea class="form-control" id="exampleTextarea" rows="2" name='body' placeholder="Type your message here" style="border-radius:0px;background-color:inherit;border:none;"></textarea>
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
                <br /><br />
                <button type="submit" class="btn btn-sm btn-primary primary_button float-right" name="button">Comment</button>

                    </form>

                  </div>

                  </blockquote>
                </div>
              </div>

            </div>{{-- row --}}

    </div>
  </div>
  <script>
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

// For Reply
function likeItReply(commentId,elem){
    var csrfToken='{{csrf_token()}}';
    var likesCount=parseInt($('#'+commentId+"-count").text());
    $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
        console.log(data);
        if(data.message==='liked'){
            $(elem).addClass('liked');
            $('#'+commentId+"-count").text(likesCount+1);
          $(elem).css({color:'red'});
        }else{
          $(elem).css({color:'black'});
            $('#'+commentId+"-count").text(likesCount-1);
            $(elem).removeClass('liked');
        }
    });

}


  // For Comments
  function likeIt(commentId,elem){
    var csrfToken='{{csrf_token()}}';
    var likesCount=parseInt($('#'+commentId+"-count").text());
    $.post('{{route('toggleLike')}}', {commentId: commentId,_token:csrfToken}, function (data) {
        console.log(data);
        if(data.message==='liked'){
            $(elem).addClass('liked');
            $('#'+commentId+"-count").text(likesCount+1);
          $(elem).css({color:'red'});
        }else{
          $(elem).css({color:'black'});
            $('#'+commentId+"-count").text(likesCount-1);
            $(elem).removeClass('liked');
        }
    });

}

// For Thread
          function likeItthread(threadId,elem){
                      var csrfToken='{{csrf_token()}}';
                      var likesCount=parseInt($('#'+threadId+"-count1").text());
                      $.post('{{route('threadtoggleLike')}}', {threadId: threadId,_token:csrfToken}, function (data) {
                          console.log(data);
                         if(data.message==='liked'){
                             $(elem).addClass('liked');
                             $('#'+threadId+"-count1").text(likesCount+1);
                             $(elem).css({color:'red'});
                         }else{
                             $(elem).css({color:'black'});
                             $('#'+threadId+"-count1").text(likesCount-1);
                             $(elem).removeClass('liked');
                         }
                      });

                  }

                  let visitCount = document.getElementById('postVisitCount').value;
          let visitCountPlusOne = parseInt('visitCount') + 1;
          
          document.getElementById('postVisitCount').value = visitCountPlusOne;


  </script>
      {{-- <script type="text/javascript" src="{{asset('js/functions.js')}}"></script>
    --}}
                
@endsection
