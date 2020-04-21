
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'default title')
    </title>
</head>
<body>
    <div class="content">
        @yield('content')
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
            url: "book/delete/"+id,
            type:  "DELETE",
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function (res)
            {
              //console.log("it Work");
              //$('#books').load('books');
            },
            error:function(err){
              // what the fuck is this shit bro ???? (it works btw)
              $('#books').load('books');

              //console.log('nope');
       }
        });
    });
    </script>
</body>
</html>