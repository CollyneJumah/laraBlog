@extends('layouts.app')

@section('content')

   <div class='jumbotron text-center'>
     <h2>Welcome to {{$title}}.</h2>
    <p>Its all about learning</p>
    <p>
        <a href='/login' role='button' class='btn btn-primary btn-sm'>Login</a>
        <a href='/register' role='button' class='btn btn-success btn-sm'>Register</a>
    </p>
   </div>
@endsection
