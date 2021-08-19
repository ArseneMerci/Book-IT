<?php
session_start();
if (!isset($_SESSION["user_id"])){
  die(header('location:login.php'));
}
$error="";
$id= $_SESSION['user_id'];
include('../Dashboard/db-connect.php');
if(isset($_POST['submit'])){
    $cpassword = md5(mysqli_real_escape_string($conn, $_POST['cpassword']));
    $newpassword = md5(mysqli_real_escape_string($conn, $_POST['newpassword']));

    $sql = "SELECT password FROM users WHERE user_id = $id";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $userPassword = $user[0]['password'];
    if($cpassword == $userPassword){
        $sql = "UPDATE users SET password='$newpassword' WHERE user_id= '$id'";
        if(mysqli_query($conn, $sql)){
            header('location:dashboard.php');
          }else {
            echo 'query error: '. mysqli_error($conn);
                }
    }else{
        $error = 'Enter Correct current Password';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../styles/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/Sidebar.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="icon" href="../img/icon.png" type="image/png">
</head>
<body>   
    <div class="wrapper" style="background-color: #f6f5fa">
        <div class="container-fluid">
          <div class="row">
            <!-- Nav start -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                  <div class="sidebar-img text-center mt-5">
                    <p><img src="../img/icon.png" alt="Logo" width="150" height="150" /></p>
                  </div>
                  <ul class="nav flex-column dash-nav">
                  <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="booking.php" class="nav-link">Book Ticket</a></li>
                    <li class="nav-item"><a href="activeTickets.php" class="nav-link">Active Tickets</a></li>
                    <li class="nav-item"><a href="expiredTickets.php" class="nav-link">Expired Tickets</a></li>
                    <li class="nav-item"><a href="changePassword.php" class="nav-link active">Change Password</a></li>
                    <li class="nav-item ml-3"><button type="button" class="btn btn-warning py-1 mt-3"><a href="logout.php" class="text-dark">Logout</a></button></li>
                  </ul>
                </div>
              </nav>
            <!-- nav end -->
            <main
          role="main"
          class="col-md-9 ml-sm-auto col-lg-10 main-content pb-4"
          style="background-color: #f6f5fa"
        >
          <h4 class=" font-weight-bold mt-5" style="font-size: 18">
            Change Password
          </h4>
          <div class="container mt-5">
            <form action="changePassword.php" method="POST" class="dash-form">
              <div class="form-group mt-3 col-6">
                <label htmlFor="plate">Current Password</label>
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control my-input no-shadow"
                    placeholder="Enter a Your current Password."
                    name="cpassword"/>
                </div>
              </div>
              <div class="form-group mt-3 col-6">
                <label htmlFor="seats">New Password</label>
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control my-input no-shadow"
                    placeholder="Enter A new Password."
                    name="newpassword"/>
                </div>
              </div>
            <p style="color:red"><?php echo $error; ?></p>
              <div class="form-group mt-5 ml-3">
                <button
                type="submit"
                class="text-white btn btn-dark px-5 mt-2"
                style="border-radius: 20"
                name="submit"
              >
                Change Password
              </button>
              </div>
            </form>
          </div>
        </main>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <footer>
</body>
</html>