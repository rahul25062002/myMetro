{{ $data }}
<!doctype html>
<html lang="en">
  <head>
    <title>Book Metro Now</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/bookmetro">Back</a>
            <form action="{{url('/')}}/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>
    <h1>Metro Detail</h1>
    <table>
        <tr>
            <th>MetroName</th>
            <th>MetroCode</th>
            <th>Line</th>
            <th>No. of Couch</th>
            <th>Starting Point</th>
            <th>Ending Point</th>
            <th>Starting Time</th>
            <th>Ending Time</th>
        </tr>

        @foreach ( $data as $alldata)
        <tr>
            <td>{{ $alldata->metroname }} </td>
            <td>{{ $alldata->metrocode }} </td>
            <td>{{ $alldata->metroline }} </td>
            <td>{{ $alldata->metrocouch }} </td>
            <td>{{ $alldata->stp }} </td>
            <td>{{ $alldata->enp }} </td>
            <td>{{ $alldata->starttime }}</td>
            <td>{{ $alldata->endtime }}</td>
        </tr>
        @endforeach

<form action="{{ url('/') }}/bookmetronow" method="POST">
    @csrf
    Enter Your Name <input type="text" name="name" placeholder="Enter Your Name" required><br><br>
    Mobile Number <input type="text" name="mobilenumber" placeholder="Enter Your Mobile Number" required><br><br>
    Booking Purpose <input type="text" name="purpose" placeholder="Enter Your Purpose" required><br><br>
    Booking Date <input type="date" name="date" required> <br> <br>
    Number Of Days <input type="text" name="days" placeholder="No. of Days Booking" required><br><br>
    <input type="submit" value="Book Now">
</form>
  </body>
</html>
