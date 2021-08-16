<?php
$conn = mysqli_connect('localhost','eich','rwanda','booking');

if(!$conn){
    die('connection error:' .mysqli_connect_error());
}
?>