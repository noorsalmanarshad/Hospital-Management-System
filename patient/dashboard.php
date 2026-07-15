<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['patient_email'];

$patient=mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM patients WHERE email='$email'"));

$patientName=$patient['full_name'];

/*=========================
COUNTS
=========================*/

$appointments=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM appointments
WHERE patient_name='$patientName'"));

$labs=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM laboratory_tests
WHERE patient_name='$patientName'"));

$prescriptions=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM prescriptions
WHERE patient_name='$patientName'"));

$bill=mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(total_amount) AS total
FROM bills
WHERE patient_name='$patientName'"));

$totalBill=$bill['total'];

$doctor=mysqli_fetch_assoc(mysqli_query($conn,
"SELECT doctor_name
FROM appointments
WHERE patient_name='$patientName'
ORDER BY appointment_date DESC
LIMIT 1"));

$latest=mysqli_fetch_assoc(mysqli_query($conn,
"SELECT *
FROM appointments
WHERE patient_name='$patientName'
ORDER BY appointment_date DESC
LIMIT 1"));

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Patient Dashboard</title>

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

<h2>

Welcome,

<?php echo $patient['full_name']; ?>

</h2>

</div>

<div class="cards">

<div class="card">

<i class="fa-solid fa-user-doctor"></i>

<h3>

Assigned Doctor

</h3>

<p>

<?php

echo ($doctor) ? $doctor['doctor_name'] : "Not Assigned";

?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-calendar-check"></i>

<h3>

Appointments

</h3>

<p>

<?php echo $appointments; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-flask"></i>

<h3>

Lab Reports

</h3>

<p>

<?php echo $labs; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-file-prescription"></i>

<h3>

Prescriptions

</h3>

<p>

<?php echo $prescriptions; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-money-bill-wave"></i>

<h3>

Total Bill

</h3>

<p>

Rs.

<?php echo number_format($totalBill); ?>

</p>

</div>

</div>

<br>

<div class="profile-card">

<h2>

Latest Appointment

</h2>

<hr><br>

<?php

if($latest){

?>

<table class="profile-table">

<tr>

<td><b>Doctor</b></td>

<td><?php echo $latest['doctor_name']; ?></td>

</tr>

<tr>

<td><b>Date</b></td>

<td><?php echo $latest['appointment_date']; ?></td>

</tr>

<tr>

<td><b>Time</b></td>

<td><?php echo date("h:i A",strtotime($latest['appointment_time'])); ?></td>

</tr>

<tr>

<td><b>Status</b></td>

<td>

<span class="<?php echo ($latest['status']=="Completed") ? "active":"pending"; ?>">

<?php echo $latest['status']; ?>

</span>

</td>

</tr>

</table>

<?php

}else{

echo "<h3>No Appointment Found</h3>";

}

?>

</div>

</div>

</body>

</html>