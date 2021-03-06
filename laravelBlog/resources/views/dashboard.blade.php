@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div >
                        <a href='/posts/create' class='btn btn-primary btn-sm'>Create post</a>
                        <h4>Your Blog posts.</h4>
                        @if (count($posts) >0)
                             <table class='table table-stripped'>
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href='/posts/{{$post->id}}/edit' class='btn btn-primary btn-sm'>edit</a></td>
                                <td>
                                    {!!Form::open(['action'=> ['PostsController@destroy', $post->id],'method'=>'POST','class'=>'pull-right'])!!}
                                        {!!Form::hidden('_method','DELETE')!!}
                                        {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                    {!!Form::close()!!}
                                </td>
                                
                            </tr>
                                
                            @endforeach
                        </table>
                        @else
                        <p>You have no any post.</p>

                        @endif
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
