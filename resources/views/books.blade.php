@extends('template.template')
@section('title', 'Books List')
  
@section('content')
  <div id="books">
    @foreach ($books as $book)
        
     <p>Title : {{$book->title}} </p> <br>
      <p>Price :{{$book->price}}</p> <br>
      <button class="delete" data-id="{{ $book->id }}" data-token="{{ csrf_token() }}" >Delete</button>
      <a href="{{ route('book.edit', ['id' => $book->id]) }}">Edit</a>

      <hr>
  
    @endforeach
  </div>
@endsection
