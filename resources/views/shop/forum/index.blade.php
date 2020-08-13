@extends('layout.layout')
@section('content')

<style>

</style>
<br /><br /><br />
  <div class="container">
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
        {{-- <li>
          @foreach ($cate as $cate)
          <a href="{{ route('forum.index', ['id'=>$cate->id, 'category' => $cate->slug] )}}">{{$td_category->name}}</a>
          @endforeach 
      </li>
        <li> > </li> --}}
        {{-- <li>{{$thread->subject}}</li>
        <li class="create_post_hide_lg">></li> --}}
        <li><a href="{{ route('forum.create') }}" class="create_post_hide_lg"> Create Post</a></li>
      </div>
    </div>

    <br />
    <div class="row">
      @include('shop.forum.partials.thread_lists')


      <div class="col-md-8">
        @foreach ($threads as $thread)
          <div class="card card-shadow mb-3 forum-card-margin-top" style="border:0px;">
          <ul class="list-group">
          <a href="{{route('forum.show', ['id' => $thread->id, 'title' => $thread->slug]) }}">
            <div class="card-header list-group-item-heading d-flex justify-content-left">
              <h6><img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;"> {{(str_limit($thread->subject, $limit = 50, $end = '...'))}}</h6>
          </a>
          <div>
            
          </div>
            <div class="vl"></div>
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0" style="width:80%;padding-right:8px;">
              <p align="justify">{!! \Michelf\Markdown::defaultTransform (str_limit(strip_tags($thread->thread), $limit = 100, $end = '...')) !!}</p>
                
              <footer class="blockquote-footer" style="color:rgba(105,105,105,0.7);font-size:12px;">  Posted by <a style="color:inherit;" href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> <cite title="Source Title">{{$thread->updated_at->diffForHumans()}}</cite>
                <ul class="forum_padding" style="">
                    <p id="" style="font-size:11px;"><i class="fa fa-comment" aria-hidden="true" style="font-size:21px;color:rgba(105,105,105,0.5);"></i>  {{$thread->comments->count()}}</p>
                    <hr>
                  <li><i class="fa fa-eye" style="font-size:12px;text-align:center;"></i> {{ $thread->visit_count }}</li>
                  <hr>
                  <li><i class="fa fa-clock" style="font-size:12px;text-align:center;"></i> {{ $thread->updated_at->format('h:ia')}}</li>
                </ul>
                  <br><br><br>
              </footer>
            </blockquote>
          </div>
          

        </div>{{-- card --}}
      @endforeach
    
        <div class="d-flex justify-content-center">
          {{ $threads->links() }}
        </div>
     

    </div>{{-- row --}}


</div>
  </div>{{-- container --}}

 

@endsection
