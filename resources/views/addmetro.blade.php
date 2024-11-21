{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Add metro</title>
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
    @if(session('error'))
    <div id="error alert" class="alert alert-danger" role="alert">
        {{ session ('error') }}
    </div>
    @endif
    <h1>Add New Metro</h1>
    <form action="{{ url('/') }}/addmetro" method="POST">
        @csrf
        Metro Name<input type="text" name="metroname" placeholder="Noida Eletrocity " required>
        Metro Code<input type="number" name="metrocode" placeholder="123456" required>
        Metro Line<input type="text" name="metroline" placeholder="Blue" required>
        Number of Couch<input type="number" name="metrocouch" placeholder="4" required>
        Starting Point<input type="text" name="stp" placeholder="Dwarka Sector 21" required>
        Ending Point<input type="text" name="enp" placeholder="Noida Eletrocity " required>
        Start Time<input type="time" name="starttime" placeholder="05:00AM" required>
        End Time<input type="time" name="endtime" placeholder="11:00PM" required>
        <input type="submit" value="Add Metro">
    </form>

  </body>
    <script>
        setTimeout(function() {
            var errorAlert = document.getElementById('error alert');
            if(errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000);
    </script>
</html> --}}

<!doctype html>
<html lang="en">
<head>
    <title>Add metro</title>
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
            position: relative; /* Added */
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        }
        .container {
            padding-top: 80px;
            position: relative; /* Added */
            z-index: 1; /* Added */
        }
        .form-control {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.5);
            z-index: 2; /* Added */
        }
    </style>
</head>
<body>
<div class="overlay"></div> <!-- Added overlay -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="/admindashboard">Back</a>
</nav>

@if(session('error'))
<div id="error-alert" class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="container">
    <h1>Add New Metro</h1>
    <form action="{{ url('/') }}/addmetro" method="POST">
        @csrf
        <div class="form-group">
            <label for="metroname">Metro Name</label>
            <input type="text" class="form-control" id="metroname" name="metroname" placeholder="Enter metro name" required>
        </div>
        <div class="form-group">
            <label for="metrocode">Metro Code</label>
            <input type="number" class="form-control" id="metrocode" name="metrocode" placeholder="Enter metro code" required>
        </div>
        <div class="form-group">
            <label for="metroline">Metro Line</label>
            <input type="text" class="form-control" id="metroline" name="metroline" placeholder="Enter metro line" required>
        </div>
        <div class="form-group">
            <label for="metrocouch">Number of Couch</label>
            <input type="number" class="form-control" id="metrocouch" name="metrocouch" placeholder="Enter number of couch" required>
        </div>
        <div class="form-group">
            <label for="stp">Starting Point</label>
            <input type="text" class="form-control" id="stp" name="stp" placeholder="Enter starting point" required>
        </div>
        <div class="form-group">
            <label for="enp">Ending Point</label>
            <input type="text" class="form-control" id="enp" name="enp" placeholder="Enter ending point" required>
        </div>
        <div class="form-group">
            <label for="starttime">Start Time</label>
            <input type="time" class="form-control" id="starttime" name="starttime" required>
        </div>
        <div class="form-group">
            <label for="endtime">End Time</label>
            <input type="time" class="form-control" id="endtime" name="endtime" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Metro</button>
    </form>
</div>

</body>
<script>
    setTimeout(function() {
        var errorAlert = document.getElementById('error-alert');
        if(errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000);
</script>
</html>
