@extends('layouts.app')

@section('content')
        <h1>Welcome to {{$title}}</h2>
        <p>This are services we offer:</p>
        @if(count($services) > 0)
            <ul class='list-group'>
                @foreach($services as $service)
                    <li class='list-group-item'>{{$service}}</li>
                @endforeach
            </ul>
        @endif


@endsection