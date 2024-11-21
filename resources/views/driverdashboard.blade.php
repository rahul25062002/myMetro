<!doctype html>
<html lang="en">
  <head>
    <title>Driver</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @if(session('success'))
    <div id="successAlert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @php
    $name = session('name');
    @endphp

    @if($name)
    <h1>Hi, {{ ucfirst($name) }}</h1>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <form action="{{url('/')}}/logout" method="POST">
         @csrf
         <button>Logout</button>
        </form>

     </nav>
  </body>
  <script>
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.style.display = 'none';
        }
    }, 10000);
</script>
</html>
