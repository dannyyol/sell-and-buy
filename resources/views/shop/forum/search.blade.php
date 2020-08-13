{{--

@section('content')
  <div class="card">
      <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

      <div class="card-body">


          @foreach($searchResults->groupByType() as $type => $modelSearchResults)
              <h2>{{ ucfirst($type) }}</h2>

              @foreach($modelSearchResults as $searchResult)
                  <ul>
                      <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>

                  </ul>
              @endforeach
          @endforeach

      </div>
  </div>


@endsection --}}

@extends('layout.search-layout')
@section('content')


    <style media="screen">
    .vl {
    border-left: 1px solid #dddd;

    height: 100%;
    position: absolute;
    right:100px;
    top:0px;
  }
  .message{
    border:2px;
    border:1px solid #ddd;
    width: 50px;
    height:50%;

    .create_post .btn-success{

    }

  }

    </style>
    <div class="container">
      <br /><br /><br /><br />
      <div class="row">

        @if(isset($data))

      </div>
      <a href="{{ route('forum.create') }}" class="btn btn-success float-right create_post" style="border-radius: 0px;
      width:200px;">Create Post</a>

      <h3>Thread</h3>
      <br />
      <div class="row">
        @include('shop.forum.partials.thread_lists')


        <div class="col-md-8">

            @foreach ($data as $threads)
          <div class="card mb-3">
            <ul class="list-group">
            <a href="{{route('forum.show', $threads->id)}}">
              <div class="card-header list-group-item-heading d-flex justify-content-left">
                <h5><img src="{{ asset("static/images/avatar.png") }}" alt="" style="width:45px;height:45px;border-radius:22.5px;"> {{(str_limit($threads->subject, $limit = 20, $end = '...'))}}</h5>
            </a>
              <div class="vl"></div>
                <p style="position:absolute;right:30px;top:25px;font-family:aria;"><i class="fa fa-comment" aria-hidden="true" style="font-size:2em;color:rgba(105,105,105,0.5);"></i> {{$threads->comments->count()}}</p>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0" style="width:80%;">
                <p align="justify">{!! \Michelf\Markdown::defaultTransform (str_limit($threads->thread, $limit = 100, $end = '...')) !!}</p>
                <footer class="blockquote-footer" style="color:rgba(105,105,105,0.7);font-size:0.7em;">  Posted by <a style="color:inherit;" href="{{route('user_profile',$threads->user->name)}}">{{$threads->user->name}}</a> <cite title="Source Title">{{$threads->updated_at->diffForHumans()}}</cite>
                  <ul style="list-style: none; position:absolute;right:15px;top:90px;">
                    <li><i class="fa fa-eye"></i> 32</li>
                    <hr>
                    <li><i class="fa fa-clock"></i> {{ $threads->updated_at->format('i:s A')}}</li>
                  </ul>

                </footer>
              </blockquote>
            </div>


          </div>{{-- card --}}
        @endforeach

      </div>{{-- row --}}


  </div>
  <div class="d-flex justify-content-center">
    {!! $data->render() !!}
  </div>
@else
  <div class="d-flex justify-content-center">
    <h3>  {{ $message }}</h3>
  </div>

@endif
    </div>{{-- container --}}

</div>
@endsection
