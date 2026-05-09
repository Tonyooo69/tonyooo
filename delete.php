<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM login_tb WHERE id='$id'";
    
    if(mysqli_query($conn, $sql)){
        header("Location: admin.php");
        exit();
    }
}

header("Location: admin.php");
exit();
?>
