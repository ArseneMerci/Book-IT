<?php
  $error ='';
  include('../Dashboard/db-connect.php');
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT admin_id FROM admin WHERE username='$username' and password='$password'";
  //getting result
  $result = mysqli_query($conn,$sql);
  //fetching results rows in array
  $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
  //checking how many answers
  $count=mysqli_num_rows($result);
  if($count == 1){
    header('location: dashboard.php');
  // } else if($count > 1){
  //   $error = 'Database Error';
  }
  else{
    $error = 'Username or Password is incorrect';
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
<title>Login</title>
</head>
<body>
        <div class="text-center form-cont">
          <h6 class=" mb-5">Admin Login</h6>
          <form action="admin.php" method="POST">
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Username:</label>
                </div>
                <div class="col-8">
                    <input type="text" placeholder="Username" name="username" class="form-booking"><br>
                </div>
            </div>
            <div class="row form-line">
                <div class="col-3">
                    <label class=" ">Password:</label>
                </div>
                <div class="col-8">
                    <input type="password" placeholder="password"  name="password" class="form-booking"><br>
                </div>
            </div>
            <p><?php echo $error; ?></p>
            <button type="submit" name="submit" class="btn form-button btn-danger mr-2">Login</button>
          </form>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
