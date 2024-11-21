<!doctype html>
<html lang="en">
<head>
    <title>View Metro Stations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <form action="{{url('/')}}/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        <a class="navbar-brand" href="/admindashboard">Back</a>

        </div>
    </nav>

    <h2>Metro Stations</h2>

    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Station Name or Code">

    <table id="stationTable" class="table table-striped">
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Station Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $station)
            <tr>
                <td>{{ $station->stationname }}</td>
                <td>{{ $station->stationcode }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#searchInput').on('keyup', function(){
            var searchText = $(this).val().toLowerCase();
            $('#stationTable tbody tr').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
            });
        });
    });
</script>

</body>
</html>
