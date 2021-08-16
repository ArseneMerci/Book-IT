<?php
  include('../Dashboard/db-connect.php');
    if(isset($_POST['submit'])){
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));

        $sql = "INSERT INTO users(fname,username,email,phone,password) VALUES('$fullname','$username','$email','$phone','$password')";

        if(mysqli_query($conn, $sql)){
          // success redirects to home
          header('Location: login.php');
        } else {
            // failure
          echo 'query error: '. mysqli_error($conn);
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../styles/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../styles/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/forms.css">
  <link rel="icon" href="../img/icon.png" type="image/png">
<title>Sign Up</title>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand logo" href="index.php"><img src="../img/icon.png" width="40px" height="40px"/><span>BOOK IT</span></a>
          </div>
          <ul class="nav navbar-nav d-inline">
            <div class="d-inline">
              <li class="d-inline nav-link"><a href="../index.php">Home</a></li>
              <li class="d-inline nav-link activelink "><a href="login.php">Booking</a></li>
              <li class="d-inline nav-link"><a href="../contact.php">Contact Us</a></li>
            </div>
          </ul>
        </div>
    </nav>
      

        <div class="text-center form-cont">
          <h6 class=" mb-3">Fill the form to sign up</h6>
          <form action="signup.php" method="POST">
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Fullname:</label>
                </div>
                <div class="col-8">
                    <input type="text" placeholder="fullname" name="fullname" class="form-booking"><br>
                </div>
            </div>
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Username:</label>
                </div>
                <div class="col-8">
                    <input type="text" placeholder="Username"  name="username" class="form-booking"><br>
                </div>
            </div>
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Phone Number:</label>
                </div>
                <div class="col-8">
                    <input type="text" placeholder="Phone Number"  name="phone" class="form-booking"><br>
                </div>
            </div>
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Email:</label>
                </div>
                <div class="col-8">
                    <input type="Email" placeholder="Email"  name="email" class="form-booking"><br>
                </div>
            </div>
            <div class="row form-line mb-4">
                <div class="col-3">
                    <label class=" ">Password:</label>
                </div>
                <div class="col-8">
                    <input type="password" placeholder="password"  name="password" class="form-booking"><br>
                </div>
            </div>
            <!-- <p><?php echo $error; ?></p> -->
            <button type="submit" name="submit" class="btn form-button btn-danger">Sign Up</button>
            <p style="display:inline;">Or Click <a href="login.php" style="color:red">LOGIN</a> If you already have an account.</p>
          </form>
        </div>


<?php include('../templates/footer_user.php') ?>
