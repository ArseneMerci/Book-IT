<?php
include('./db-connect.php');

//write querry
$sql = 'SELECT fname,ticket_id,ligne FROM tickets t join users u ON u.user_id = t.user ORDER BY ticket_time';

//get result
$result = mysqli_query($conn,$sql);

//fetch in array
$tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tickets</title>
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
                    <li class="nav-item"><a href="newBus.php" class="nav-link">Add Bus</a></li>
                    <li class="nav-item"><a href="allBus.php" class="nav-link">All Buses</a></li>
                    <li class="nav-item"><a href="allTickets.php"class="nav-link active">All Tickets</a></li>
                    <li class="nav-item ml-3"><button type="button" href="../index.php" class="btn btn-warning py-1 mt-3"><a href="../index.php" class="text-dark">Logout</a></button></li>
                  </ul>
                </div>
              </nav>
            <!-- nav end -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content pb-4"style="background-color: #f6f5fa">
              <h4 class=" font-weight-bold mt-4" style="font-size: 18">
                All Registered Tickets
              </h4>
              <div class="container-fluid mt-5">
                <div class="mt-5">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">N0.</th>
                            <th scope="col">Customer Names</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Departure Date</th>
                            <th scope="col">Seat N0.</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tickets as $ticket): ?>
                            <tr>
                              <td><?php echo $ticket['ticket_id']; ?></td>
                              <td><?php echo $ticket['fname']; ?></td>
                              <td><?php echo $ticket['ligne']; ?></td>
                              <!-- <td><?php echo $ticket['destination']; ?></td>
                              <td><?php $d = strtotime($ticket['ticket_time']);echo date('d/m/Y', $d); ?></td>
                              <td><?php $d = strtotime($ticket['ticket_time']);echo date('H:i:s A', $d); ?></td>
                              <td><?php echo $ticket['seat_no']; ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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