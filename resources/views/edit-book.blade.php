
@extends('template.template')
@section('title', 'Edit a book')

@section('content')
    <form method="post">
        @csrf
        @method('put')
        <input type="text" name="title" value="{{$book->title}}">
        <input type="number" step="0.01" name="price" value="{{$book->price}}">
        <input type="submit" name="submit" value="Create">
    </form>
@endsection