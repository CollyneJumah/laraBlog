@extends('layouts.app')

@section('content')
    <a href='/posts' class='btn btn-primary btn-sm'>Go back</a>
    <h2>{{$posts->title}}</h2>
    <div class='row'>
        <div class='col-md-4 col-md-6-offset'>
            <img style='width:100%' src='/storage/cover_images/{{$posts->cover_image}}'>
        </div>
    </div>
    <br><br>
    <div class='article'>
        <p>{{$posts->body}}</p>
    </div>
    <hr>
    <small>Posted on {{$posts->created_at}} by {{$posts->user->name}}</small>
    <hr>

    @if (!Auth::guest())
        @if (Auth::user()->id==$posts->user_id)
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-info btn-sm">Edit</a>
            {!!Form::open(['action'=> ['PostsController@destroy', $posts->id],'method'=>'POST','class'=>'pull-right'])!!}
                {!!Form::hidden('_method','DELETE')!!}
                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
            {!!Form::close()!!}
        @endif
    @endif
       
  
    
@endsection