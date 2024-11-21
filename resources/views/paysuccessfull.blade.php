<!doctype html>
<html lang="en">
  <head>
    <title>Transaction</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="/dashboard">Back</a>

            <form action="{{url('/')}}/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>
{{-- {{ $data }} --}}

<div>
    <table>
        <th>
            S.NO
        </th>
        <th>
            Name:
        </th>
        <th>
            Product Name
        </th>
        <th>
            Number Of Ticket
        </th>
        <th>
            Amount
        </th>
        <th>
            Payment id
        </th>
        <th>
            Payment Date
        </th>
        <th>
            Booking Date
        </th>
        @php
            $date=Bookmetros::
        @endphp
        @foreach ($data as $payment)
        <tr><td>{{ $payment->id }}</td>
            <td>{{  $payment->customer_name }}</td>
            <td>{{  $payment->product_name }}</td>
            <td>{{  $payment->quantity }}</td>
            <td>{{  $payment->amount }}</td>
            <td>{{  $payment->payment_id }}</td>
            <td>{{  $payment->created_at }}</td></tr>
        @endforeach


    </table>


  </body>
</html>


