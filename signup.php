<?php
include 'db.php';
if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login_tb (username,firstname,lastname,password) VALUES ('$username', '$firstname', '$lastname', '$password')";
        if(mysqli_query($conn, $sql)){
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>