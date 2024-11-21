<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
    </nav>
    @if(session('error'))
    <div id="error-alert" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <div class="container mt-4">
        <h1>Register Now</h1>
        <form action="{{url('/')}}/signup" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="New Delhi" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <select id="state" name="state" class="form-control">
                        <option>Delhi</option>
                        <option>Uttar Pradesh</option>
                        <option>Panjab</option>
                        <option>Chennai</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="pincode">Pin Code</label>
                    <input type="text" name="pincode" class="form-control" id="pincode" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
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
