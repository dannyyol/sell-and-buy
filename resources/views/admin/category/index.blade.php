@extends('admin.layout.admin')

@section('content')

<div id="container">
    <style>
        th, td{
            margin:auto;
            text-align: center;
        }
        .add_school{
          text-align:right;
          margin-bottom:20px;
        }
    </style>
    
    
    
        <div class="add_school">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Category</button>
        </div>
        <table class="table  table-sm">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($categories))
              @forelse ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                      <a href="{{route('categories.edit', $category->id)}}">Edit</a>
                      <form action="{{ route('categories.destroy', $category->id)}}"method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <input type="submit" value='Delete'>
                      </form>
                  </td>
                </tr>
              @empty
            : No data
            @endforelse
            
            
            <tr>
                <td>2</td>
                <td>John</td>
                <td>johncarter@mail.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Peter</td>
                <td>peterparker@mail.com</td>
            </tr>            
        </tbody>
    </table>
  </div>    
  
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    {!! Form::open(['route' => 'categories.store', 'method'=>'POST']) !!}


    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Add School</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width:50rem;margin:auto;text-align:center;">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" name="button">Close</button>
          <button type="submit" class="btn btn-primary" name="button">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
</div>


</section>
@endif
@endsection
