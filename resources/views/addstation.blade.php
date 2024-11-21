<!doctype html>
<html lang="en">
<head>
    <title>Admin - Add Metro Station</title>
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
@if(session('error'))
<div id="errorAlert" class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admindashboard">Home</a>
    <form class="form-inline ml-auto" action="{{url('/')}}/showstation" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-primary ml-2">Show Station</button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline ml-auto" action="{{url('/')}}/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h2>Add Metro Station</h2>

    <form action="{{url('/')}}/addedstation" method="POST">
        @csrf
        <div class="form-group">
            <label for="stationname">Station Name</label>
            <input type="text" class="form-control" id="stationName" name="stationname" required>
        </div>
        <div class="form-group">
            <label for="stationcode">Station Code</label>
            <input type="text" class="form-control" id="stationCode" name="stationcode" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Station</button>
    </form>
</div>

<script>
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
    setTimeout(function() {
        var errorAlert = document.getElementById('errorAlert');
        if(errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000);
</script>

</body>
</html>
