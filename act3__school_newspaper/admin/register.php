<?php require_once 'classloader.php'; ?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <style>
    body {
      font-family: "Arial";
      background-image: url("https://img.freepik.com/premium-photo/pastel-tone-purple-pink-blue-gradient-defocused-abstract-photo-smooth-lines_49683-4702.jpg?w=1380");
    }
  </style>
  <title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-5">
        <div class="card shadow">
         <?php  
         if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

          if ($_SESSION['status'] == "200") {
            echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
          }

          else {
            echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>"; 
          }

        }
        unset($_SESSION['message']);
        unset($_SESSION['status']);
        ?>
        <div class="card-header">
          <h2>Welcome to admin side! Register Now as admin!</h2>
        </div>
        <form action="core/handleForms.php" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" required>
              <input type="submit" class="btn btn-primary float-right mt-4" name="insertNewUserBtn">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>