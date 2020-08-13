<div class="col-md-4">

  <form action="{{ url('/forum/search') }}" method="POST" role="search">
    {{ csrf_field() }}


        <div class="form-group">
            <input type="text" name="q" class="form-control" placeholder="Search">
        </div>

    </form>
  <div class="card side_bar" style="border:0px;">

    <p class="card-header">
      
    <span class="label label-default badge badge-success pull-right">{{$threadCount}}</span>
     
    </span>

    <a href="{{route('forum.index')}}">All Threads</a></p>
    

      <ul class="list-group">

        
        @foreach ($tdcategory as $category)
       
       
        {{-- <a class="blockquote" href="{{route('forum.index',['tag'=>$tag->id])}}"> --}}
         {{-- <span class="badge badge-primary badge-pill float-right">{{ $tags->count() }}</span>
         <p>{{$tag->name}}</p> --}}
         <a class="list-group-item" href="{{route('forum.index',['id'=>$category->id, 'category' => $category->slug])}}" style="border-left:0px;border-right:0px;">
         
 
          <span class="label label-default badge badge-success pull-right">

                {{ $category->threads_count}}
           </span>
           

         {{$category->name}}
         </a>
      
          @endforeach
        
      </ul>

  </div>



</div>
