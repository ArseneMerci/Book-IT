<?php
session_start();
if (!isset($_SESSION["admin_id"])){
  die(header('location:admin.php'));
}
include('db-connect.php');
  $id =$_GET['id'];
  $sql = "DELETE FROM admin WHERE admin_id= $id";
  //echo $query;
  if(mysqli_query($conn, $sql)){
	  header('location:allAdmin.php?status=success');
  }else{
    header('location:allAdmin.php?status=failed');
  }

?>