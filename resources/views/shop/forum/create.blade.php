@extends('layout.layout')

@section('content')
  <link rel="stylesheet" href="{{asset('/css/richtext.min.css')}}">
    <script src="{{ asset('/js/js/richtext.js') }}"></script>
    <script src="{{ asset('/js/jquery.richtext.min.js') }}"></script>
 {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script> --}}
   <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
<div class="container">
  <br><br><br><br>
  <div class="row">
    <div class="col-md-12">
      @include('shop.forum.partials.error')
      @include('shop.forum.partials.success')
    </div>

  </div>


{{-- <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea',plugins:'link code' });</script> --}}
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
            <h4>Create Post</h4>
            {{-- @include('shop.forum.bbcode_function') --}}
            
            <form class="form-vertical" action="{{ route('forum.store') }}" method="post" role="form" id="create-post-form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Enter title" name="subject" value="{{ old('subject') }}" style="background-color:rgba(128,128,128, 0.1);border:none;">
              </div>

              <div class="form-group">



                    {{-- <select name="tags[]" multiple id="tag" placeholder= "Choose Category">
                        
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach --}}

                        {{-- <select name="category"  id="tag" placeholder= "Choose Category"> --}}
                            {{-- todo add from db--}}
                            {{-- @foreach($td_categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
    
                        </select> --}}

                        {{ Form::select('tdCategory_id', $td_categories, null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Select Category']) }}

                    </select>
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
              
        {{-- <div class="message_buttons">
          <input type="button" value="Bold" onclick="javascript:insert('[b]', '[/b]', 'message');" /><!--
          --><input type="button" value="Italic" onclick="javascript:insert('[i]', '[/i]', 'message');" /><!--
          --><input type="button" value="Underlined" onclick="javascript:insert('[u]', '[/u]', 'message');" /><!--
          --><input type="button" value="Image" onclick="javascript:insert('[img]', '[/img]', 'message');" /><!--
          --><input type="button" value="Link" onclick="javascript:insert('[url]', '[/url]', 'message');" /><!--
          --><input type="button" value="Left" onclick="javascript:insert('[left]', '[/left]', 'message');" /><!--
          --><input type="button" value="Center" onclick="javascript:insert('[center]', '[/center]', 'message');" /><!--
          --><input type="button" value="Right" onclick="javascript:insert('[right]', '[/right]', 'message');" />
      </div> --}}
              <div class="form-group">
                  <textarea class="content" name="thread" placeholder="Enter post"></textarea>
                  <script>
                    $('.content').richText();
                  </script>
                
    {{-- <script>
      // Replace the <textarea id="editor1"> with an CKEditor
      // instance, using the "bbcode" plugin, customizing some of the
      // editor configuration options to fit BBCode environment.
      CKEDITOR.replace('editor1', {
        height: 20,
        // Add plugins providing functionality popular in BBCode environment.
        extraPlugins: 'bbcode,smiley,font,colorbutton,justify',
        // Remove unused plugins.
        removePlugins: 'filebrowser,format,horizontalrule,pastetext,pastefromword,scayt,showborders,stylescombo,table,tabletools,tableselection,wsc',
        // Remove unused buttons.
        removeButtons: 'Anchor,BGColor,Font,Strike,Subscript,Superscript,JustifyBlock',
        // Width and height are not supported in the BBCode format, so object resizing is disabled.
        disableObjectResizing: true,
        // Define font sizes in percent values.
        fontSize_sizes: "30/30%;50/50%;100/100%;120/120%;150/150%;200/200%;300/300%",
        // Strip CKEditor smileys to those commonly used in BBCode.
        smiley_images: [
          'regular_smile.png', 'sad_smile.png', 'wink_smile.png', 'teeth_smile.png', 'tongue_smile.png',
          'embarrassed_smile.png', 'omg_smile.png', 'whatchutalkingabout_smile.png', 'angel_smile.png',
          'shades_smile.png', 'cry_smile.png', 'kiss.png'
        ],
        smiley_descriptions: [
          'smiley', 'sad', 'wink', 'laugh', 'cheeky', 'blush', 'surprise',
          'indecision', 'angel', 'cool', 'crying', 'kiss'
        ]
      });
    </script> --}}

                {{-- <textarea class="content" name="thread" placeholder="Enter post"></textarea> --}}
              {{-- <script>
              $('.content').richText();
              </script> --}}
                {{-- <textarea type="text" class="form-control content" id="" placeholder="Enter post" name="thread" value="" style="background-color:rgba(128,128,128, 0.1);border:none;">{{ old('thread') }}</textarea> --}}
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary primary_button float-right">Create</button>
            </form>
          </div>

      </div>
        </div>

      </div>
      @include('shop.forum.partials.thread_lists')
    </div>


    











  </div>

</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script> --}}

    <script>

        // $(function () {
        //     $('#tag').selectize();
        // })


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
    {{-- <script type="text/javascript" src="{{asset('js/functions.js')}}"></script> --}}
@endsection
