<?php
  session_start();
  ?>
<?php
  $error ='';
  include('Dashboard/db-connect.php');
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT user_id,username FROM users WHERE username='$username' and password='$password'";
  //getting result
  $result = mysqli_query($conn,$sql);
  //fetching results rows in array
  $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
  //checking how many answers
  $count=mysqli_num_rows($result);
  if($count == 1){
    $_SESSION['user_id'] = $users[0]['user_id'];
    $_SESSION['username'] = $users[0]['username'];
    header('location: user/dashboard.php');
  } else{
    $error = 'Username or Password is incorrect';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="styles/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/forms.css">
  <link rel="icon" href="img/icon.png" type="image/png">
<title>Login</title>
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
              <li class="d-inline nav-link activelink "><a href="login.php">Booking</a></li>
              <li class="d-inline nav-link"><a href="contact.php">Contact Us</a></li>
            </div>
          </ul>
        </div>
    </nav>
      

        <div class="text-center form-cont">
          <h6 class=" mb-5">You need to login before booking your Ticket</h6>
          <form action="login.php" class="" method="POST">
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
            <p style="color:red"><?php echo $error; ?></p>
            <button type="submit" name="submit" class="btn form-button btn-danger mr-2">Login</button>
            <p style="display:inline;">Or Click <a href="user/signup.php" style="color:red">SIGN UP</a> For new account</p>
          </form>
          </div class="form_login">
        </div>


<?php include('templates/footer_user.php') ?>
