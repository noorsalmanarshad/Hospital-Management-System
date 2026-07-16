<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Add Doctor</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-user-doctor"></i>
<a href="doctors.php">Doctors</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Add New Doctor</h2>

</div>

<div class="form-container">

<form action="save_doctor.php" method="POST" enctype="multipart/form-data">

<div class="row">

<div class="input-box">

<label>Full Name</label>

<input type="text" name="name" placeholder="Enter full name" required>

</div>

<div class="input-box">

<label>Email</label>

<input type="email" name="email" placeholder="Enter email" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Password</label>

<input type="password" name="password" placeholder="Enter password" required>

</div>

<div class="input-box">

<label>Phone</label>

<input type="text" name="phone" placeholder="0000-0000000" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Department</label>

<select name="department" required>

<option value="" disabled selected>
-- Select Department --
</option>

<option>Cardiology</option>

<option>Neurology</option>

<option>Orthopedic</option>

<option>Pediatrics</option>

<option>Dermatology</option>

<option>ENT</option>

</select>

</div>

<div class="input-box">

<label>Gender</label>

<select name="gender" required>

<option value="" disabled selected>
-- Select Gender --
</option>

<option>Male</option>

<option>Female</option>

<option>Other</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Date of Birth</label>

<input type="date" name="dob" placeholder="00-00-0000" required>

</div>

<div class="input-box">

<label>Doctor Image</label>

<input type="file" name="photo">

</div>

</div>

<div class="input-box">

<label>Address</label>

<textarea name="address"></textarea>

</div>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Save Doctor

</button>

</form>

</div>

</div>

</body>

</html>