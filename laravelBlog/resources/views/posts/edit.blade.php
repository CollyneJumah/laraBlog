@extends('layouts.app')

@section('content')
    <h2>Edit Posts</h2>
    {!! Form::open(['action'=> ['PostsController@update',$posts->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
      <div class='col-md-4'>
         <div class='form-group'>
            {{Form::label('title','Title')}}
            {{Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Title'])}}
         </div>
         <div class='form-group'>
            {{Form::label('body','Message')}}
            {!!Form::textarea('body',$posts->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter your post message'])!!}
         </div>
          <div class='form-group'>
            {{Form::file('cover_image')}}
         </div>

          {{Form::submit('Update',['class'=>'btn btn-primary btn-sm'])}}
      </div>
      {{Form::hidden('_method','PUT')}}

    {!! Form::close() !!}
    
@endsection