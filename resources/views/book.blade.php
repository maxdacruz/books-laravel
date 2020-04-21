@extends('template.template')
@section('title', 'Books List')
@section('content')
  <div id="books">
      
   <p>Title : {{$book->title}} </p> <br>
    <p>Price :{{$book->price}}</p> <br>
  <p>Author : {{$author->name}}</p>
    <hr>


  </div>
  @endsection