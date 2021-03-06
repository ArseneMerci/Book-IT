<?php 
session_start();
if (!isset($_SESSION["user_id"])){
  die(header('location:../login.php'));
}
$username= $_SESSION['username'];
include('../Dashboard/db-connect.php');
$sql = "SELECT * FROM tickets WHERE user ='4'";
$result = mysqli_query($conn,$sql);
$tickets = mysqli_fetch_all($result,MYSQLI_ASSOC);
$activeT = 0;
$expT = 0;
foreach($tickets as $ticket){
  if(date("Y-m-d h:i:s")>$ticket['ticket_time']){
    $expT++;
  }else{
    $activeT++;
  }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Statistics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="../styles/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/Sidebar.css">
    <link rel="stylesheet" href="../styles/StatCard.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="icon" href="../img/icon.png" type="image/png">
</head>
<body>   
    <div class="wrapper" style="background-color: '#f6f5fa'">
        <div class="container-fluid">
          <div class="row">
            <!-- Nav start -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                  <div class="sidebar-img text-center mt-5">
                    <p><img src="../img/icon.png" alt="Logo" width="150" height="150" /></p>
                  </div>
                  <ul class="nav flex-column dash-nav">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link active">Dashboard</a></li>
                    <li class="nav-item"><a href="booking.php" class="nav-link">Book Ticket</a></li>
                    <li class="nav-item"><a href="activeTickets.php" class="nav-link">Active Tickets</a></li>
                    <li class="nav-item"><a href="expiredTickets.php" class="nav-link">Expired Tickets</a></li>
                    <li class="nav-item"><a href="changePassword.php" class="nav-link">Change Password</a></li>
                    <li class="nav-item ml-3"><button type="button" class="btn btn-warning py-1 mt-3"><a href="logout.php" class="text-dark">Logout</a></button></li>
                  </ul>
                </div>
              </nav>
          </div>
            <!-- nav end -->
            <main
              role="main"
              class="col-md-9 ml-sm-auto col-lg-10 main-content pb-4"
              style="background-color: '#000'"
            >
              <h4 class=" font-weight-bold mt-4" style="font-size: 18">
                Hello <?php echo strtoupper($username); ?>,
              </h4>
              <h4 class=" font-weight-bold mt-4" style="font-size: 18">
                Quick Statistics
              </h4>
              <!-- Active Tickets -->
              <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="stat-div px-3 py-2">
                          <div class="row">
                            <div class="col-9">
                              <div class="stat-content">
                                <span class="d-block stat-title ">Active Tickets</span>
                                <span class="d-block stat-data font-weight-bold ">
                                   <?php echo $activeT ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!-- End Active Tickets -->
              <!-- Expired Tickets -->
                      <div class="col-3">
                        <div class="stat-div px-3 py-2">
                          <div class="row">
                            <div class="col-9">
                              <div class="stat-content">
                                <span class="d-block stat-title ">Expired Tickets</span>
                                <span class="d-block stat-data font-weight-bold ">
                                <?php echo $expT ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!-- End Expired Tickets -->
                </div>
              </div>
            </main>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <footer>
</body>
</html>