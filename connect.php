<?php 
  $db_host = 'localhost';
  $db_name = 'articals'; 
  $db_user = 'root'; 
  $db_pass = '';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn){
    die("connection failed".mysqli_connect_error());

}
?>