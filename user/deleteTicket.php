<?php
session_start();
if (!isset($_SESSION["user_id"])){
  die(header('location:login.php'));
}
include('../Dashboard/db-connect.php');
  $id =$_GET['id'];
  $sql = "DELETE FROM tickets WHERE ticket_id= $id";
  //echo $query;
  if(mysqli_query($conn, $sql)){
	  header('location:activeTickets.php?status=success');
  }else{
    header('location:activeTickets.php?status=failed');
  }

?>