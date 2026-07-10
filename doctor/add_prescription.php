<?php
session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>New Prescription</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>
<i class="fa-solid fa-user-doctor"></i>
Doctor Panel
</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-hospital-user"></i>
<a href="patients.php">My Patients</a>
</li>

<li>
<i class="fa-solid fa-flask-vial"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li class="active">
<i class="fa-solid fa-file-prescription"></i>
<a href="prescriptions.php">Prescriptions</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- MAIN -->

<div class="main">

<div class="topbar">

<h2>
<i class="fa-solid fa-file-prescription"></i>
New Prescription
</h2>

</div>

<div class="form-container">

<form action="save_prescription.php" method="POST">

<div class="row">

<div class="input-box">

<label>Patient Name</label>

<input type="text" name="patient_name" required>

</div>

<div class="input-box">

<label>Dosage</label>

<select name="dosage" required>

<option value="">Select Dosage</option>

<option>Once Daily</option>

<option>Twice Daily</option>

<option>Three Times Daily</option>

<option>Every 6 Hours</option>

<option>Every 8 Hours</option>

<option>Every 12 Hours</option>

<option>Before Meal</option>

<option>After Meal</option>

<option>At Bedtime</option>

<option>As Needed (SOS)</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Medicine</label>

<textarea name="medicine" required></textarea>

</div>

<div class="input-box">

<label>Duration</label>

<select name="duration" required>

<option value="">Select Duration</option>

<option>3 Days</option>

<option>5 Days</option>

<option>7 Days</option>

<option>10 Days</option>

<option>14 Days</option>

<option>15 Days</option>

<option>21 Days</option>

<option>1 Month</option>

<option>2 Months</option>

<option>3 Months</option>

<option>6 Months</option>

</select>

</div>

</div>

<div class="input-box">

<label>Instructions</label>

<textarea name="instructions"></textarea>

</div>

<br>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Save Prescription

</button>

</form>

</div>

</div>

</body>