<?php 
require 'connect.php';
$ide=$_GET['id'];
$del="DELETE from post WHERE id='$ide'";
$qurey=mysqli_query($conn,$del);
if ($qurey){
    echo "<script>
    alert('done thank you');
    
    
</script>";
}
else echo "wrong";
$conn->close();
?>
