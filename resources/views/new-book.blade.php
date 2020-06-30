
@extends('template.template')
@section('title', 'Create a new book')

@section('content')
    <form method="post" id="test">
        @csrf
        <input type="text" name="title">
        <input type="number"  name="price">
				<input type="submit"  value="Create">

				<label for="author">Author:</label>
				<select id="author" name="id">
					@foreach ($authors as $one)
					<option  value="{{$one->id}}">{{$one->name}}</option>
						
					@endforeach

				</select>
		</form>

		<div id="res"></div>



			<script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"> </script>

  <script>

   $("#test").submit(function(){
		$('#res').empty()
        event.preventDefault();
        //let token = $(this).data("token");
				let form = $('#test')
        $.ajax(
        {
            url: "/bookss/create",
            type:  "POST",
            data: form.serialize(),

            success: function(res)
            {
							console.log(res);

            },
            error:function(err){
							console.log(err);
							for (const iterator of err) {
							$('#res').html(iterator)
								
							}

       }
        });
    });
    </script>
@endsection