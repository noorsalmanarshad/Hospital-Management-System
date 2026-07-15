<?php
include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Staff</title>

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
<i class="fa-solid fa-users"></i>
<a href="staff.php">Staff</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Add Staff</h2>

</div>

<div class="form-container">

<form action="save_staff.php" method="POST" enctype="multipart/form-data">

<div class="row">

<div class="input-box">

<label>Full Name</label>

<input type="text" name="full_name" required>

</div>

<div class="input-box">

<label>Email</label>

<input type="email" name="email" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Password</label>

<input type="password" name="password" required>

</div>

<div class="input-box">

<label>Contact Number</label>

<input type="text" name="contact" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>CNIC</label>

<input type="text" name="cnic" placeholder="00000-0000000-0" required>

</div>

<div class="input-box">

<label>Gender</label>

<select name="gender">

<option>Male</option>

<option>Female</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Date of Birth</label>

<input type="date" name="dob">

</div>

<div class="input-box">

<label>Address</label>

<input type="text" name="address">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Staff Role</label>

<select name="role">

<option>Receptionist</option>

<option>Billing Officer</option>

<option>Cashier</option>

<option>Lab Technician</option>

<option>Pharmacist</option>

<option>Ward Assistant</option>

</select>

</div>

<div class="input-box">

<label>Shift</label>

<select name="shift">

<option>Morning</option>

<option>Evening</option>

<option>Night</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Duty Status</label>

<select name="duty_status">

<option>On Duty</option>

<option>On Leave</option>

</select>

</div>

<div class="input-box">

<label>Salary</label>

<input type="number" name="salary">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Working Hours</label>

<select name="working_hours">

<option>6 Hours</option>

<option>8 Hours</option>

<option>10 Hours</option>

<option>12 Hours</option>

</select>

</div>

<div class="input-box">

<label>Work Duration</label>

<input type="text" name="work_duration" placeholder="e.g. 3 Years">

</div>

</div>

<div class="input-box">

<label>Previous Experience</label>

<textarea name="previous_job"></textarea>

</div>

<div class="row">

<div class="input-box">

<label>Join Date</label>

<input type="date" name="join_date">

</div>

<div class="input-box">

<label>Photo</label>

<input type="file" name="photo">

</div>

</div>

<button class="save-btn">

Save Staff

</button>

</form>

</div>

</div>

</body>

</html>