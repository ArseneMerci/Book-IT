<?php
  // include('Dashboard/db-connect.php');
  $errors = array('fname'=>'','ticket_time'=>'','incorrect'=>'');
  if(isset($_POST['submit'])){
    echo "<script type='text/JavaScript'>  alert(date('d-m-y h:i:s')); </script>";
    if(empty($_POST['ticket_time'])){
      $errors['ticket_time'] = "Input time please";
    }else if($_POST['ticket_time']<= date('d-m-y h:i:s')){
      echo '<script type="text/JavaScript">  alert("You can not book a ticket from the past!"); </script>';
    }

    if(empty($_POST['fname'])){
      $errors['fname'] = "Input your full name please";
    }else {
      if(!preg_match("/^([a-zA-Z' ]+)$/",$_POST['fname'])){
      $errors['fname'] = "The name you entered is invalid";
      }
    }
    if(array_filter($errors)){
      // echo "errors are present";
    }else{
      $fname = mysqli_real_escape_string($conn, $_POST['fname']);
      $departure = mysqli_real_escape_string($conn, $_POST['departure']);
      $destination = mysqli_real_escape_string($conn, $_POST['destination']);
      $ticket_time = mysqli_real_escape_string($conn, $_POST['ticket_time']);

      //check if it has already been filled
      $sql = "SELECT id,departure,destination FROM booking WHERE ticket_time = '$ticket_time' and (destination ='$destination' and departure = '$departure')";

      // get the result set (set of rows)
      $result = mysqli_query($conn, $sql);
      // check how many results
      $count = mysqli_num_rows($result);
      if($count>='3'){
        echo '<script type="text/JavaScript">  alert("This bus is full"); </script>';
      }else{
        $seat_no = ++$count;
        $sql = "INSERT INTO booking(fname,departure,destination,ticket_time,seat_no) VALUES('$fname','$departure','$destination','$ticket_time','$seat_no')";
        if(mysqli_query($conn, $sql)){
          // success
          header('Location: index.php');
        } else {
          echo 'query error: '. mysqli_error($conn);
        }
      }
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
<title>Booking</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand logo" href="index.php"><img src="../img/icon.png" width="40px" height="40px"/><span>BOOK IT</span></a>
          </div>
          <ul class="nav navbar-nav d-inline">
            <div class="d-inline">
              <li class="d-inline nav-link"><a href="index.php">Home</a></li>
              <li class="d-inline nav-link activelink "><a href="user/login.php">Booking</a></li>
              <li class="d-inline nav-link"><a href="contact.php">Contact Us</a></li>
            </div>
          </ul>
        </div>
    </nav>

    <div class="text-center form-cont mb-5">
      <h3>Booking</h3>
      <p>Book your transport ticket by filling the bellow form</p>
      <form action="booking.php" method="POST">
        <div class="row form-line">
          <div class="col-3">
            <label class=" ">Name:</label>
          </div>
          <div class="col-8">
            <input type="text" placeholder="Name" name="fname" class="form-booking"><br>
          </div>
        </div>
        <p class="error-red"><?php echo $errors['fname'] ?></p>
        <div class="row form-line">
          <div class="col-3">
            <label class=" ">Departure:</label>
          </div>
          <div class="col-8">
            <select name="departure" class="form-booking">
              <option value="Muhanga">Muhanga</option>
              <option value="Huye">Huye</option>
              <option value="Musanze">Musanze</option>
              <option value="Rusizi">Rusizi</option>
              <option value="Kigali">Kigali</option>
            </select><br>
          </div>
        </div>
        <div class="row form-line">
          <div class="col-3">
            <label >Destination:</label>
          </div>
          <div class="col-8">
            <select name="destination" class="form-booking">
              <option value="Kigali">Kigali</option>
              <option value="Muhanga">Muhanga</option>
              <option value="Huye">Huye</option>
              <option value="Musanze">Musanze</option>
              <option value="Rusizi">Rusizi</option>
            </select><br>
          </div>
        </div>
        <div class="row form-line">
          <div class="col-3">
            <label >Time:</label>
          </div>
          <div class="col-8">
            <input type="datetime-local" name="ticket_time" class="form-booking"><br>
          </div>
        </div>
        <p class="error-red"><?php echo $errors['ticket_time'] ?></p>
          <button type="submit" name="submit" class="btn form-button btn-warning">Book</button>
      </form>

    </div>

<?php include('../templates/footer_user.php') ?>
