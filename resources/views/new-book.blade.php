
@extends('template.template')
@section('title', 'Create a new book')

@section('content')
    <form method="post">
        @csrf
        <input type="text" name="title">
        <input type="number"  name="price">
        <input type="submit" name="submit" value="Create">
    </form>

    @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
@endsection