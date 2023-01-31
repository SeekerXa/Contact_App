<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body class="antialiased">
      {{date('Y')}}
      <br />
      {{3+7}}
      <br />
      {{"<h3>Hello </h3>"}}
      {!!"<h3>Hello </h3>"!!}
      <?= "<h3>Hello </h3>" ?>

      <h2>
        Hello @{{ name}}
      </h2>

      @php
        $message = "Hello world";
      @endphp

       <h2> {{ $message}}</h2>
       
       {{-- This is comment --}}


    </body>
</html>
