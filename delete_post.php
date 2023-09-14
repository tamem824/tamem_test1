<?php 
require 'connect.php';
$ide=$_GET['id'];
$del="DELETE from post WHERE id='$ide'";
$qurey=mysqli_query($conn,$del);
if ($qurey){
    echo "done thank you";
}
else echo "wrong";
$conn->close();
?>
