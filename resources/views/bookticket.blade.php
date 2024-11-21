<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="dashboard" class="navbar-brand">Home</a>

        <form action="{{url('/')}}/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav><br><br>
<div class="container">
    <div class="row">
        <!-- Left Side: Between Stations -->
        <div class="col-md-6 order-md-1">
            <h1>Between Stations </h1>
            <ul class="list-group">
                @php
                    use App\Models\station;
                    $smallid= min($dt1->id,$dt2->id);
                    $midpoint = ceil(($dt2->id - $dt1->id)) + $dt1->id;
                if($dt1->id>$dt2->id)
                {
                  for($i=$dt1->id; $i>=$midpoint; $i=$i-1)
                    {
                        $id=station::find($i);
                        $name=$id->stationname;
                        echo "<li class='list-group-item'>$name</li>";
                    }
                }
                if($dt1->id<=$dt2->id)
                {
                  for($i=$dt1->id; $i<=$midpoint; $i=$i+1)
                    {
                        $id=station::find($i);
                        $name=$id->stationname;
                        echo "<li class='list-group-item'>$name</li>";
                    }
                }
                @endphp
            </ul>
        </div>

        <!-- Right Side: Payment -->
        <div class="col-md-6 order-md-2">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/assest/12.jpeg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">{{ $dt1->stationname }}</h2>
                            <h5 class="card-text">Station Code: ({{$dt1->stationcode  }})</h5>
                            <h6>To</h6>
                            <h2 class="card-title">{{ $dt2->stationname }}</h2>
                            <h5 class="card-text">Station Code: ({{$dt2->stationcode}})</h5>

                            @php
                                $r = abs($dt1->id -  $dt2->id) ;
                                $Amount=$r*2;
                                if($Amount>60)
                                {
                                    $Amount=60;
                                }
                                else if($Amount<5){
                                    $Amount=5;
                                }
                            @endphp
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><p class="card-text"><b>Total Pay Amount:</b>&nbsp;Rs.{{$Amount }} only</p></li>
                        </ul>
                        <div class="card-body">
                            <form action="{{ route('razorpay') }}" method="POST">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key ="{{env('RAZORPAY_KEY')}}"
                                        data-amount="{{$Amount * 100}}"
                                        data-buttontext="Pay With Razorpay"
                                        data-image=""
                                        data-notes.customer_name="{{ $nm }}"
                                        data-notes.customer_email="{{ $email }}"
                                        data-notes.product_name="Ticket"
                                        data-notes.quantity="1"></script>
                            </form>
                            <a href="dashboard" class="card-link">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
