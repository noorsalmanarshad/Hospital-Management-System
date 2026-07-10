<?php
include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Test</title>

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
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Add Laboratory Test</h2>

</div>

<div class="form-container">

<form action="save_test.php" method="POST">

<!-- Row 1 -->

<div class="row">

<div class="input-box">
<label>Patient Name</label>
<input type="text" name="patient_name" placeholder="Enter Patient Name" required>
</div>

<div class="input-box">
<label>Test Name</label>
<select name="test_name">
<option>CBC Test</option>
<option>Blood Sugar</option>
<option>Urine Test</option>
<option>X-Ray</option>
<option>MRI</option>
<option>CT Scan</option>
</select>
</div>

</div>

<!-- Row 2 -->

<div class="row">

<div class="input-box">
<label>Doctor Name</label>
<input type="text" name="doctor_name" placeholder="Enter Doctor Name" required>
</div>

<div class="input-box">
<label>Test Date</label>
<input type="date" name="test_date" required>
</div>

</div>

<!-- Row 3 -->

<div class="row">

<div class="input-box">
<label>Result</label>
<select name="result">
<option>Pending</option>
<option>Completed</option>
</select>
</div>

<div class="input-box">
<label>Blood Group</label>
<select name="blood_group">
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>
</select>
</div>

</div>

<!-- Row 4 -->

<div class="row">

<div class="input-box">
<label>Hemoglobin (Hb)</label>
<input type="text" name="hemoglobin" placeholder="e.g. 13.5 g/dL">
</div>

<div class="input-box">
<label>Blood Sugar</label>
<input type="text" name="sugar_level" placeholder="e.g. 110 mg/dL">
</div>

</div>

<!-- Row 5 -->

<div class="row">

<div class="input-box">
<label>Blood Pressure</label>
<input type="text" name="blood_pressure" placeholder="120/80">
</div>

<div class="input-box">
<label>&nbsp;</label>
</div>

</div>

<!-- Remarks -->

<div class="input-box">
<label>Remarks</label>
<textarea name="remarks" rows="5"></textarea>
</div>

<button class="save-btn">
Save Test
</button>

</form>

</div>

</div>

</body>

</html>