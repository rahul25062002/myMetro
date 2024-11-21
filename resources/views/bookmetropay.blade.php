{{ $dt }}
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <table>
        <tr>
            <th>Your Name</th>
            <th>Mobile Number</th>
            <th>Your Purpose</th>
            <th>Booking Date</th>
            <th>Number Of Days Booking</th>
            <th>Total Amount</th>
        </tr>
        <tr><td>{{ $dt->name }}</td>
        <td>{{ $dt->mobilenumber }}</td>
        <td>{{ $dt->purpose }}</td>
        <td>{{ $dt->date }}</td>
        <td>{{ $dt->days }}</td>
        @php
                $a=$dt->days;
                $Amount=$a*20000;
        @endphp
        <td>{{ $Amount }}</td>
        <td><div class="card-body">
            <form action="{{ route('razorpay') }}" method="POST">
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key ="{{env('RAZORPAY_KEY')}}"
                        data-amount="{{$Amount * 100}}"
                        data-buttontext="Pay With Razorpay"
                        data-image=""
                        data-notes.customer_name="{{ $dt->name }}"
                        data-notes.customer_email="{{ $email }}"
                        data-notes.product_name="Book Metro"
                        data-notes.quantity="{{ $dt->days }}"></script>
            </form>
            <a href="dashboard" class="card-link">Cancel</a>
        </div></td>
        </tr>
    </table>
  </body>
</html>
