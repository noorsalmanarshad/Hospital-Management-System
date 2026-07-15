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

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>

<body>

<div class="sidebar">

<h2>Patient Panel</h2>

<ul>

<li class="active">
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<i class="fa-solid fa-user"></i>
<a href="profile.php">My Profile</a>
</li>

<li>
<i class="fa-solid fa-user-doctor"></i>
<a href="doctor.php">My Doctor</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-file-prescription"></i>
<a href="prescriptions.php">Prescriptions</a>
</li>

<li>
<i class="fa-solid fa-money-bill"></i>
<a href="bills.php">Bills</a>
</li>

<li>
<i class="fa-solid fa-notes-medical"></i>
<a href="medical_history.php">Medical History</a>
</li>

<li>
<i class="fa-solid fa-comment"></i>
<a href="feedback.php">Feedback</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

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