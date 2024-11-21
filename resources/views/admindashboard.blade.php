<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        .container {
            padding-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
@if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@php
    $name = session('name');
@endphp

@if($name)
    <div class="container">
        <h1 class="mb-4">Hi, {{ ucfirst($name) }}</h1>
    </div>
@endif

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/adminview" class="btn btn-outline-primary">Add Admin</a>
            </li>
            <li class="nav-item">
                <a href="/addmetroview" class="btn btn-outline-primary ml-2">Add Metro</a>
            </li>
            <li class="nav-item">
                <a href="/approvedriver" class="btn btn-outline-success ml-2">Approve</a>
            </li>
            <li class="nav-item">
                <a href="/addstation" class="btn btn-outline-primary ml-2">Add Station</a>
            </li>
            <li class="nav-item">
                <a href="/trash" class="btn btn-outline-danger ml-2">Maintenance</a>
            </li>
        </ul>
        <form action="{{url('/')}}/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Available Metro</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Metro Name</th>
                <th>Metro Code</th>
                <th>Metro Line</th>
                <th>Assign Driver</th>
                <th>Trash</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $alldata)
            <tr>
                <td>{{$alldata->metroname}}</td>
                <td>{{$alldata->metrocode}}</td>
                <td>{{ $alldata->metroline }}</td>
                <td>
                    <form action="{{ url('assigndriver',['id'=> $alldata->id]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">Assign Driver</button>
                    </form>
                </td>
                <td>
                    <form action="{{ url('delete',['id'=> $alldata->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Maintenance</button>
                    </form>
                </td>
                <td>
                    <form action="{{ url('edit',['id'=> $alldata->id]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">Edit</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
