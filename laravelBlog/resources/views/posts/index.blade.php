@extends('layouts.app')

@section('content')
    <h2>Post</h2>
     @if(count($posts)>0)
        @foreach($posts as $post)
        
            <div class="well well-sm">
                <div class='row'>
                    <div class='col-md-4 col-sm-4'>
                    <img style='width:100%' src='/storage/cover_images/{{$post->cover_image}}'>
                </div>
                 <div class='col-md-8 col-sm-8'>
                    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                    <small>Posted on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
                </div>
            </div>
        @endforeach
        {{-- pagination --}}
        {{$posts->links()}}

     @else
        <p>No post found</p>
    @endif
@endsection