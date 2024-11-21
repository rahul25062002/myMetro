<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
<div class="container">
    <h1 class="mb-4">Add Admin</h1>
    @if(session('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{url('/')}}/registered" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="New Delhi" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputCity">City</label>
                    <input type="text" name="city" class="form-control" id="inputCity" required>
                </div>
                <div class="form-group">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control">
                        <option>Delhi</option>
                        <option>Uttar Pradesh</option>
                        <option>Punjab</option>
                        <option>Chennai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputrole">Role</label>
                    <select id="inputrole" name="role" class="form-control">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputZip">Pin Code</label>
                    <input type="text" name="pincode" class="form-control" id="inputZip" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Admin</button>
    </form>
</div>


<script>
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
</script>
</body>
</html>
