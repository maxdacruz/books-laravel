@extends('template.template')
@section('title', 'Books List')


  
@section('content')
  <div id="books">
    <p>
      Price :
    </p>
    <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ url("books/asc") }}'">ASC</button>
    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url("books/desc") }}'">DESC</button>
    @foreach ($books as $book)
        
     <p>Title : {{$book->title}} </p> <br>
      <p>Price :{{$book->price}}</p> <br>
      <button class="delete" data-id="{{ $book->id }}" data-token="{{ csrf_token() }}" >Delete</button>
      <a href="{{ route('book.edit', ['id' => $book->id]) }}">Edit</a>

      <hr>
  
    @endforeach
    {{$books->links()}}
  </div>
  <script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"> </script>

  <script>




   $(".delete").click(function(){
        event.preventDefault();
        let id = $(this).data("id");
        let token = $(this).data("token");
        $.ajax(
        {
            url: "../book/delete/"+id,
            type:  "delete",
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function(res)
            {
              //console.log("it Work");
              //$('#books').load('books');
            },
            error:function(err){
              // what the fuck is this shit bro ???? (it works btw)

              location.reload()

              //console.log('nope');
       }
        });
    });
    </script>
@endsection
