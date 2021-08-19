<?php
session_start();
if (!isset($_SESSION["user_id"])){
  die(header('location:login.php'));
}
include('../Dashboard/db-connect.php');
if(isset($_GET['status'])){
  if($_GET['status']=='success'){
  echo "<script>alert('Ticket Canceled Successfuly.')</script>";
  }else{
    echo "<script>alert('oups!!failed to cancel the ticket.')</script>";
  }
}
if(isset($_GET['update'])){
  if($_GET['update']=='success'){
  echo "<script>alert('Ticket Updated Successfuly.')</script>";
  }else{
    echo "<script>alert('oups!!failed to update the ticket.')</script>";
  }
}
$id= $_SESSION['user_id'];
$now_time = date("Y-m-d h:i:s");
//write querry
$sql = "SELECT * FROM tickets t join ligne l ON t.ligne = l.ligne_id WHERE (user = $id AND ticket_time >= '$now_time') ORDER BY ticket_time";
//get result
$result = mysqli_query($conn,$sql);

//fetch in array
$tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "<script>
function cancel_ticket(ticket_id) {
  let cancel = confirm('Do you really want to cancel the Ticket');
  if(cancel == true){
    window.location.replace('deleteTicket.php?id='+ ticket_id);
  }
};
function update_ticket(ticket_id) {
  let update = confirm('Do you really want to update the Ticket');
  if(update == true){
    window.location.replace('updateTicket.php?id='+ ticket_id);
  }
};
  </script>";
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Tickets</title>
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
                    <li class="nav-item"><a href="activeTickets.php" class="nav-link active">Active Tickets</a></li>
                    <li class="nav-item"><a href="expiredTickets.php" class="nav-link">Expired Tickets</a></li>
                    <li class="nav-item"><a href="changePassword.php" class="nav-link">Change Password</a></li>
                    <li class="nav-item ml-3"><button type="button" class="btn btn-warning py-1 mt-3"><a href="logout.php" class="text-dark">Logout</a></button></li>
                  </ul>
                </div>
              </nav>
            <!-- nav end -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content pb-4"style="background-color: #f6f5fa">
              <h4 class=" font-weight-bold mt-4" style="font-size: 18">
                All Your Active Tickets
              </h4>
              <div class="container-fluid mt-5">
                <div class="mt-5">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">N0.</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Departure Date</th>
                            <th scope="col">Seat N0.</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($tickets as $ticket): ?>
                            <tr>
                              <td><?php echo ++$no; ?></td>
                              <td><?php echo $ticket['departure']; ?></td>
                              <td><?php echo $ticket['destination']; ?></td>
                              <td><?php $d = strtotime($ticket['ticket_time']);echo date('H:i:s A', $d); ?></td>
                              <td><?php $d = strtotime($ticket['ticket_time']);echo date('d/m/Y', $d); ?></td>
                              <td><?php echo $ticket['seat_no']; ?></td>
                              <td><span><button class="mr-2 btn btn-danger" onclick="cancel_ticket(<?php echo $ticket['ticket_id']; ?>)">cancel</button></span><span><button class ="btn btn-warning" onclick="update_ticket(<?php echo $ticket['ticket_id']; ?>)">Reschedule</button></span></td>
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