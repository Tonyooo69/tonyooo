<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit;
}

include 'db.php';
$firstname = $_SESSION['user'];
$sql = "SELECT * FROM login_tb WHERE firstname='$firstname'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if(!isset($_SESSION['login_time'])) {
    $_SESSION['login_time'] = time();
}
$time_spent = time() - $_SESSION['login_time'];
$hours = floor($time_spent / 3600);
$minutes = floor(($time_spent % 3600) / 60);
$seconds = $time_spent % 60;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Account - PitoySenpai</title>
</head>
<body>
    <img src="pictures/guko.png" class="bg">
    <header>
        <div>
            <div class="logo"><span>tonyooo</span></div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a class="active" href="account.php">Account</a></li>
                    <li><input type="text" placeholder="search..."></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
    <p>Time spent: <?php echo $hours; ?>h <?php echo $minutes; ?>m <?php echo $seconds; ?>s</p>
    <div style="text-align: center; margin-top: 30px;">
        <a href="logout.php" style="color: white; font-size: 20px; font-weight: bold; text-decoration: none; background: rgba(0,0,0,0.7); padding: 10px 20px; border-radius: 10px; margin-top: 20px;">Logout</a>
    </div>
</body>
</html>