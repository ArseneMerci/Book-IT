<?php
  include('../Dashboard/db-connect.php');
  $sql = "SELECT * FROM ligne";
  $result = mysqli_query($conn,$sql);
  $lignes = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if(isset($_POST['submit'])){
    //escape harmful inputs
    $user_id = mysqli_real_escape_string($conn, '4');
    $ligne_id = mysqli_real_escape_string($conn, $_POST['ligne']);
    $ticket_time = mysqli_real_escape_string($conn, $_POST['ticket_time']);
    $sql = "INSERT INTO tickets(user,ligne,ticket_time) VALUES($user_id,$ligne_id,'$ticket_time')";
    if(mysqli_query($conn, $sql)){
      header('Location: dashboard.php');
    }else {
      echo 'query error: '. mysqli_error($conn);
          }
  }
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
  <link rel="stylesheet" href="../styles/forms.css">
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
                    <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="booking.php" class="nav-link active">Book Ticket</a></li>
                    <li class="nav-item"><a href="allBus.php" class="nav-link">All Buses</a></li>
                    <li class="nav-item"><a href="allTickets.php"class="nav-link">All Tickets</a></li>
                    <li class="nav-item ml-3"><button type="button" href="../index.php" class="btn btn-warning py-1 mt-3"><a href="../index.php" class="text-dark">Logout</a></button></li>
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
            <div class="text-center form-cont mb-5">
      <h3>Booking</h3>
      <p>Book your transport ticket by filling the bellow form</p>
      <form action="booking.php" method="POST">
        <!-- <p class="error-red"><?php echo $errors['fname'] ?></p> -->
        <div class="row form-line">
          <div class="col-3">
            <label class=" ">Destination:</label>
          </div>
          <div class="col-8">
            <select name="ligne" class="form-booking">
              <?php foreach($lignes as $ligne): ?>
              <option value="<?php echo $ligne['ligne_id'];?>"><?php echo $ligne['departure'];?> - <?php echo $ligne['destination'];?> (<?php echo $ligne['price'].'rwf';?>)</option>
              <?php endforeach; ?>
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
        <!-- <p class="error-red"><?php echo $errors['ticket_time'] ?></p> -->
          <button type="submit" name="submit" class="btn form-button btn-warning">Book</button>
      </form>

    </div>
            </main>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <footer>
</body>
</html>