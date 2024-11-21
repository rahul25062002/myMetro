<!doctype html>
<html lang="en">
<head>
    <title>USER</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

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
<h1 class="text-center mt-4">Welcome Back, {{ ucfirst($name) }}</h1>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <form action="{{url('/')}}/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        <a href="bookmetro">Book Metro</a>
        <form action="{{ url('/')}}/paysuccessfull" method="get">
            <button>My Ticket</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Book Ticket - Delhi Metro</h2>

    <form action="{{url('/')}}/bookticket" method="POST">
        @csrf
        <div class="form-group">
            <label for="startStation">Start Station</label>
            <select class="form-control" id="startStation" name="startStation">
                @foreach ($dt as $station)
                    <option value="{{ $station->stationname }}">{{ $station->stationname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="endStation">End Station</label>
            <select class="form-control" id="endStation" name="endStation">
                @foreach ($dt as $station)
                    <option value="{{ $station->stationname }}">{{ $station->stationname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Book Ticket</button>
</div>






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
