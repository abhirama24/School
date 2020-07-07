<?php 

//setting up the connection
$connection=mysqli_connect('localhost','abhi','abhi1234','scnd');

//cehcking the connection

if(!$connection)
  echo 'Error' . mysqli_connect_error();
 ?>
