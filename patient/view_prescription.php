<?php

session_start();

if(!isset($_SESSION['patient_email'])){
header("Location: ../auth/login.php");
exit();
}

include("../config/database.php");

$id=$_GET['id'];

$sql="SELECT * FROM prescriptions WHERE id='$id'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Prescription Details</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

<div class="main">

<div class="topbar">

<h2>Prescription Details</h2>

</div>

<div class="profile-card">

<table class="profile-table">

<tr>

<td><b>Patient</b></td>

<td><?php echo $row['patient_name']; ?></td>

</tr>

<tr>

<td><b>Doctor</b></td>

<td><?php echo $row['doctor_name']; ?></td>

</tr>

<tr>

<td><b>Medicine</b></td>

<td><?php echo $row['medicine']; ?></td>

</tr>

<tr>

<td><b>Dosage</b></td>

<td><?php echo $row['dosage']; ?></td>

</tr>

<tr>

<td><b>Duration</b></td>

<td><?php echo $row['duration']; ?></td>

</tr>

<tr>

<td><b>Instructions</b></td>

<td><?php echo $row['instructions']; ?></td>

</tr>

<tr>

<td><b>Notes</b></td>

<td><?php echo $row['notes']; ?></td>

</tr>

<tr>

<td><b>Prescription Date</b></td>

<td><?php echo $row['prescription_date']; ?></td>

</tr>

</table>

<br>

<a href="prescriptions.php" class="save-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

</div>

</body>

</html>