<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Delhi Metro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <style>
         body {
             margin: 0;
             padding: 0;
             overflow: hidden;
             font-family: Arial, sans-serif;
         }

         #slider-container {
             width: 100%;
             height: 100vh;
             position: relative;
             overflow: hidden;
         }

         #slider {
             width: 100%;
             height: 100%;
             display: flex;
             transition: transform 0.5s ease-in-out;
         }

         .slide {
             width: 100%;
             height: 100%;
             flex-shrink: 0;
             background-size: cover;
             background-position: center;
         }

         #form-container {
             position: absolute;
             top: 50%;
             left: 80%;
             transform: translate(-50%, -50%);
             background-color: rgba(255, 255, 255, 0.8);
             padding: 50px;
             border-radius: 30px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
             z-index: 1;
         }

         form {
             display: flex;
             flex-direction: column;
         }

         input {
             margin-bottom: 30px;
             padding: 10px;
             border: 1px solid #ccc;
             border-radius: 4px;
         }

         input[type="submit"] {
             background-color: #4caf50;
             color: white;
             cursor: pointer;
         }
         header {
             background-color: #d86f6f;
             overflow: hidden;
         }

         ul {
             list-style-type: none;
             margin: 0;
             padding: 0;
             overflow: hidden;
         }

         li {
             float: left;
         }

         a {
             display: block;
             color: rgb(7, 82, 35);
             text-align: center;
             padding: 14px 16px;
             text-decoration: none;
         }

         a:hover {
             background-color: #ddd;
             color: black;
         }

     </style>
 </head>
 <body>
      <header>
        <h2> Welcome To Delhi Metro </h2>
     </header>


     <div id="slider-container">

         <div id="slider">
             <div class="slide" style="background-image: "><img width="100%" height="100%" src="/assest/11h.jpeg"></div>
             <div class="slide" style="background-image: "><img width="100%" height="100%" src="/assest/12.jpeg"></div>
             <div class="slide" style="background-image: "><img  width="100%" height="100%" src="/assest/13h.jpeg"></div>
             <div class="slide" style="background-image: "><img width="100%" height="100%" src="/assest/4h.jpeg"></div>
             <div class="slide" style="background-image: "><img width="100%" height="100%" src="/assest/14h.jpeg"></div>
         </div>
     </div>

     <div id="form-container">
        @if(session('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        @if(session('error'))
        <div id="errorAlert" class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
         <h2>Login</h2>
         <form action="{{url('/')}}/login" method="POST">
            @csrf
             <label for="email">Email:</label>
             <input type="email" id="email" name="email" required>

             <label for="password">Password</label>
             <input type="password" id="password" name="password" required>

             <button type="submit" class="btn btn-info">Login</button>
         </form>
         <br>
         <a href="register" > New User </a>
         <a href="adddriverview">Apply For Driver</a>
     </div>

     <script>
         let slider = document.getElementById('slider');
         let slides = document.querySelectorAll('.slide');

         let currentIndex = 0;

         function showSlide(index) {
             if (index < 0) {
                 currentIndex = slides.length - 1;
             } else if (index >= slides.length) {
                 currentIndex = 0;
             } else {
                 currentIndex = index;
             }

             let transformValue = -currentIndex * 100 + '%';
             slider.style.transform = 'translateX(' + transformValue + ')';
         }

         setInterval(() => {
             showSlide(currentIndex + 1);
         }, 1000);
     </script>
<script>
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if(successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
    setTimeout(function() {
        var errorAlert = document.getElementById('errorAlert');
        if(errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000);
</script>
 </body>
 </html>
