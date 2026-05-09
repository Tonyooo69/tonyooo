<?php
session_start();
include 'db.php';
if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_tb WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = $username;
        $_SESSION['login_time'] = time();
        header("Location: index.html");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>PitoySenpai</title>
</head>
<body>
    <div class="main">
        <div class="form-container">
            <h2>Login</h2><br>
            <?php if(isset($error)): ?>
                <p style="color: red; text-align: center; margin-bottom: 10px;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST" action="index.html">
                <div class="grid-form">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" name="submit">Enter</button><br>
                </div>
            </form>
            <a href="signup.php" style="display: block; text-align: center; color: blue;">Sign-Up</a>
        </div>
    </div>
</body>
</html>
