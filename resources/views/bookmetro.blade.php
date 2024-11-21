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
    <a class="navbar-brand" href="/dashboard">Back</a>

    </div>
</nav>


<div class="container mt-4">
    <h2 class="mb-4">Available Metro</h2>
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Metro Name">
    <table id="metroTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Metro Name</th>
                <th>Metro Code</th>
                <th>Metro Line</th>
                <th>Starting Point</th>
                <th>Ending Point</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $alldata)
            <tr>
                <td>{{ $alldata->metroname }}</td>
                <td>{{ $alldata->metrocode }}</td>
                <td>{{ $alldata->metroline }}</td>
                <td>{{ $alldata->stp }}</td>
                <td>{{ $alldata->enp }}</td>
                <td>{{ $alldata->starttime }}</td>
                <td>{{ $alldata->endtime }}</td>
                <td>
                    <a href="bookmetronow/{{ $alldata->id }}">Book Metro</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#metroTable').DataTable();

        // Add search functionality
        $('#searchInput').on('keyup', function() {
            table.search($(this).val()).draw();
        });
    });
</script>

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
