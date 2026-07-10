<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$result = mysqli_query($conn,"SELECT * FROM settings LIMIT 1");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Settings</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-gear"></i>
<a href="settings.php">Settings</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- Main -->

<div class="main">

<div class="topbar">

<h2>Settings</h2>

</div>

<!-- Account Settings -->

<div class="form-container">

<h3><i class="fa-solid fa-user"></i> Account Settings</h3>

<div class="row">

<div class="input-box">

<label>Full Name</label>

<input type="text" value="Admin">

</div>

<div class="input-box">

<label>Email</label>

<input type="email" value="admin@gmail.com">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Phone Number</label>

<input type="text" value="+92 3000000000">

</div>

<div class="input-box">

<label>Username</label>

<input type="text" value="admin">

</div>

</div>

</div>

<br>

<!-- Notification -->

<div class="form-container">

<h3><i class="fa-solid fa-bell"></i> Notification Settings</h3>

<label>

<input type="checkbox" checked>

 Email Notifications

</label>

<br><br>

<label>

<input type="checkbox" checked>

 Appointment Notifications

</label>

<br><br>

<label>

<input type="checkbox">

 Laboratory Notifications

</label>

<br><br>

<label>

<input type="checkbox">

 Billing Notifications

</label>

</div>

<br>

<!-- Security -->

<div class="form-container">

<h3><i class="fa-solid fa-lock"></i> Security</h3>

<div class="row">

<div class="input-box">

<label>Current Password</label>

<input type="password">

</div>

<div class="input-box">

<label>New Password</label>

<input type="password">

</div>

</div>

<div class="input-box">

<label>Confirm Password</label>

<input type="password">

</div>

<button class="save-btn">

Update Password

</button>

</div>

<br>

<!-- Hospital Information -->

<div class="form-container">

<h3><i class="fa-solid fa-hospital"></i> Hospital Information</h3>

<div class="row">

<div class="input-box">

<label>Hospital Name</label>

<input type="text" value="Subhan Care">

</div>

<div class="input-box">

<label>Contact</label>

<input type="text" value="+92 3210000000">

</div>

</div>

<div class="input-box">

<label>Hospital Address</label>

<textarea>Gujrat, Pakistan</textarea>

</div>

</div>

<br>

<!-- About -->

<div class="form-container">

<h3><i class="fa-solid fa-circle-info"></i> About System</h3>

<p><strong>System :</strong> Subhan Care Hospital Management System</p>

<p><strong>Version :</strong> 1.0</p>

<p><strong>Developed By :</strong> Noor Salman</p>

</div>

<br>

<button class="save-btn">

Save All Settings

</button>

</div>