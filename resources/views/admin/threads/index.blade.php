@extends('admin.layout.admin')

@section('title', '|Create Category For Thread')
@section('content')

<div id="container">
<style>
    th, td{
        margin:auto;
        text-align: center;
    }
</style>


<a class="" data-toggle="modal" data-target="#myModal">Add School</a>
    <table class="table  table-sm">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($td_categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{route('thread.edit', $category->id)}}">Edit</a>
                <form action="{{ route('thread.destroy', $category->id)}}"method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" Value='Delete'>
                </form>
            </td>
        </tr>
        @endforeach
        
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



  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    {!! Form::open(['route' => 'thread.store', 'method'=>'POST']) !!}


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

@endsection