<?php
  include('dashboard/db-connect.php');
    if(isset($_POST['submit'])){
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $sql = "INSERT INTO message(fname,email,subject,message) VALUES('$fullname','$email','$subject','$message')";

        if(mysqli_query($conn, $sql)){
          // success redirects to home
          echo "<script>alert('Message sent Successfully!'); window.location.replace('index.php')</script>";
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
  <link rel="stylesheet" href="styles/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="styles/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/forms.css">
  <link rel="icon" href="img/icon.png" type="image/png">
<title>Contact Us</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand logo" href="index.php"><img src="img/icon.png" width="40px" height="40px"/><span>BOOK IT</span></a>
          </div>
          <ul class="nav navbar-nav d-inline">
            <div class="d-inline">
              <li class="d-inline nav-link"><a href="index.php">Home</a></li>
              <li class="d-inline nav-link"><a href="user/login.php">Booking</a></li>
              <li class="d-inline nav-link activelink "><a href="contact.php">Contact Us</a></li>
            </div>
          </ul>
        </div>
    </nav>



<div class="text-center form-cont">
  <h3>Contact Us</h3>
  <p>Let us Get in Touch, We are just one click away.</p>
  <form action="contact.php" method="POST">
    <div class="row form-line">
      <div class="col-3">
        <label class=" ">Name:</label>
      </div>
      <div class="col-8">
        <input type="text" placeholder="FullName" class="form-booking" name="fullname"><br>
      </div>
    </div>
    <div class="row form-line">
      <div class="col-3">
        <label class=" ">Email:</label>
      </div>
      <div class="col-8">
        <input type="email" placeholder="email" class="form-booking" name="email"><br>
      </div>
    </div>
    <div class="row form-line">
      <div class="col-3">
        <label class=" ">Subject:</label>
      </div>
      <div class="col-8">
        <input type="text" placeholder="Subject" class="form-booking" name="subject"><br>
      </div>
    </div>
    <div class="row form-line">
      <div class="col-3">
        <label class=" ">Message:</label>
      </div>
      <div class="col-8">
        <textarea id="message" name="message" rows="3" cols="40">
          </textarea>
      </div>
    </div>
      <button type="submit" class="btn form-button btn-secondary" name="submit">Send Message</button>
  </form>
</div>

<?php include('templates/footer_user.php') ?>
