<?php

session_start();

if(!isset($_SESSION['name'])){

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Welcome</title>

<link rel="stylesheet" href="../assets/css/login.css">

</head>

<body>

<div class="forgot-container">

<div class="forgot-card">

<h2>

Welcome,
<?php echo $_SESSION['name']; ?>

</h2>

<br>

<h3>

Role :
<?php echo $_SESSION['role']; ?>

</h3>

<br>

<p>

Login Successful

</p>

<br>

<a href="logout.php">

<button class="login-btn">

Logout

</button>

</a>

</div>

</div>

</body>

</html>