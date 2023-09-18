<?php

require 'connect.php';
$ide = $_GET['id'];
$select = "SELECT * FROM post WHERE category_id = '".$ide."'";
$result = $conn->query($select);

if ($result->num_rows === 0) {
    
    $del = "DELETE FROM category WHERE id = '".$ide."'";
    $query = mysqli_query($conn, $del);
    if ($query) {
        echo "<script>
        alert('delete succeful');
        </script>";
    } else {
        echo "wrong";
    }
} else {
    echo "some article exists";
}
?>