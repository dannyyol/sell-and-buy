@extends('admin.layout.admin')

@section('title', '|Create Category For Thread')
@section('content')


<div id="container">
    {{-- Edit Category --}}
              {{Form::open(array('route' => array('categories.update', $category->id)))}}

            {{-- {!! Html::linkRoute ('posts.edit', 'Edit', array($post->id), array('class'=>'edit_button')) !!}
         --}}
         {{ method_field('PATCH') }}
            
                  <div class="form-group" style="width:50rem;margin:auto;text-align:center;">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $category->name, array('class' => 'form-control')) }}
                  </div>
        
                
               
                  {{ Form::submit('Updated', array('class'=>'btn btn-primary')) }}
       
        {!! Form::close() !!}
                
</div>
@endsection