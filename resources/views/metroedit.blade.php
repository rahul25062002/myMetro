<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://source.unsplash.com/1600x900/?nature');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
        }
        .container {
            padding-top: 80px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="/admindashboard">Back</a>
    </nav>
    <div>
    <h1>Update Metro</h1>
    <form action="{{ url('update',['id'=> $data->id]) }}" method="POST">
        @csrf
        Metro Name<input type="text" name="metroname" placeholder="Noida Eletrocity " value="  {{ $data->metroname }}" required >
        Metro Code<input type="number" name="metrocode" placeholder="123456" value="  {{ $data->metrocode }}"required>
        Metro Line<input type="text" name="metroline" placeholder="Blue" value="  {{ $data->metroline }}"  required>
        Number of Couch<input type="number" name="metrocouch" placeholder="4" value="  {{ $data->metrocouch }}" required>
        Starting Point<input type="text" name="stp" placeholder="Dwarka Sector 21"  value="  {{ $data->stp }}" required>
        Ending Point<input type="text" name="enp" placeholder="Noida Eletrocity" value="  {{ $data->enp }}" required>
        Start Time<input type="time" name="starttime" placeholder="05:00AM"  value="  {{ $data->starttime }}" required>
        End Time<input type="time" name="endtime" placeholder="11:00PM"  value="  {{ $data->endtime }}" required>
        <input type="submit" value="Update Metro">
    </form>
    </div>
  </body>
</html>
