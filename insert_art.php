<!-- 
<?php
require 'connect.php';
$pic=$_FILES["img"];
$picname=$pic["name"];
$pictmp=$pic["tmp_name"];
$sql = "INSERT INTO post (name,descraption,body,img)
VALUES ('John', 'Doe', 'john@example.com','$picname')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    move_uploaded_file($pictmp,"image/$picname");
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 