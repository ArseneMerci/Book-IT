<?php
session_start();
if (!isset($_SESSION["admin_id"])){
  die(header('location:admin.php'));
}
?>
<?php 
$username= $_SESSION['admin_username'];

include('../Dashboard/db-connect.php');
$sql = "SELECT * FROM users ORDER BY created_at";
$user_result = mysqli_query($conn,$sql);
$users =mysqli_num_rows($user_result);
$sql = "SELECT * FROM buses ORDER BY created_at";
$bus_result = mysqli_query($conn,$sql);
$buses =mysqli_num_rows($bus_result);
$sql = "SELECT * FROM ligne ORDER BY created_at";
$lignes_result = mysqli_query($conn,$sql);
$lignes =mysqli_num_rows($lignes_result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <li class="nav-item"><a href="addAdmin.php" class="nav-link">Add Admin</a></li>
                    <li class="nav-item"><a href="addLigne.php" class="nav-link">Add Ligne</a></li>
                    <li class="nav-item"><a href="addBus.php" class="nav-link">Add Bus</a></li>
                    <li class="nav-item"><a href="allAdmin.php"class="nav-link">All Admin</a></li>
                    <li class="nav-item"><a href="allTickets.php"class="nav-link">All Tickets</a></li>
                    <li class="nav-item"><a href="allUsers.php"class="nav-link">All Users</a></li>
                    <li class="nav-item"><a href="allLigne.php"class="nav-link">All Ligne</a></li>
                    <li class="nav-item"><a href="allBuses.php"class="nav-link">All Buses</a></li>
                    <li class="nav-item"><a href="allMessages.php"class="nav-link">All Messages</a></li>
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
              <!-- Active Users -->
              <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="stat-div px-3 py-2">
                          <div class="row">
                            <div class="col-9">
                              <div class="stat-content">
                                <span class="d-block stat-title ">ALL USERS</span>
                                <span class="d-block stat-data font-weight-bold ">
                                   <?php echo $users ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!-- End Active Users -->
              <!-- Lignes -->
                    <div class="col-3">
                        <div class="stat-div px-3 py-2">
                          <div class="row">
                            <div class="col-9">
                              <div class="stat-content">
                                <span class="d-block stat-title ">ALL LIGNES</span>
                                <span class="d-block stat-data font-weight-bold ">
                                   <?php echo $lignes ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!-- End Lignes -->
              <!-- Expired Buses -->
                      <div class="col-3">
                        <div class="stat-div px-3 py-2">
                          <div class="row">
                            <div class="col-9">
                              <div class="stat-content">
                                <span class="d-block stat-title ">ALL BUSES</span>
                                <span class="d-block stat-data font-weight-bold ">
                                <?php echo $buses ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!-- End Expired Buses -->
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