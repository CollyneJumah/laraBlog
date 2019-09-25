<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name','myBlog') }}</title>
        <link rel='stylesheet' href='{{ asset("css/bootstrap.min.css")}}'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}

    </head>
    <body>
         @include('inc.navbar')
        <div class='container'>
            @include('inc.message')
            @yield('content')
        </div>

         <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

<script src='{{asset('js/bootstrap.min.js')}}'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
