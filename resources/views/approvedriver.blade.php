<!doctype html>
<html lang="en">
<head>
    <title>Approval</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: rgba(255, 255, 255, 0.5);
        }
        .card {
            margin-bottom: 20px;
        }
        .card-title {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/admindashboard">Back</a>
</nav>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 center-text">
        <h1>Approve Now</h1>
    </div>
</div>
    <div class="row">
        @foreach ($data as $alldata)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $alldata->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><b>Email:</b> {{ $alldata->email }}</h6>
                    <p><b>Address:</b> {{ $alldata->address }} <br>
                       <b>City:</b> {{ $alldata->city }}<br>
                       <b>State:</b> {{ $alldata->state }}<br>
                       <b>Pincode:</b> {{ $alldata->pincode }}<br>
                       @foreach($alldata->getrole as $roledata)
                       <b>Role:</b> {{ $roledata->rolename }}<br>
                       <b>Adhar Number:</b> {{ $roledata->adhar }}</p>

                    @if($roledata->status == 0)
                        <form action="{{ url('/updatestatus/' . $roledata->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Waiting</button>
                        </form>
                    @elseif($roledata->status == 1)
                        <form action="{{ url('/updatestatus/' . $roledata->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approved</button>
                        </form>
                    @elseif($roledata->status == 2)
                        <form action="{{ url('/updatestatus/' . $roledata->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Blocked</button>
                        </form>
                    @elseif($roledata->status == 3)
                        <form action="{{ url('/updatestatus/' . $roledata->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Cancelled</button>
                        </form>
                    @else
                        <span class="badge badge-secondary">Unknown Status</span>
                    @endif
                @endforeach

                <div class="float-right">
                    <button ><a href="send-mail"> Send Mail</a></button>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
