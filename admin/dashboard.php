<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!="Admin"){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

/* Total Doctors */
$doctor_query=mysqli_query($conn,"SELECT COUNT(*) AS total FROM doctors");
$doctor=mysqli_fetch_assoc($doctor_query);

/* Total Patients */
$patient_query=mysqli_query($conn,"SELECT COUNT(*) AS total FROM patients");
$patient=mysqli_fetch_assoc($patient_query);

/* Total Appointments */
$appointment_query=mysqli_query($conn,"SELECT COUNT(*) AS total FROM appointments");
$appointment=mysqli_fetch_assoc($appointment_query);

/* Revenue */

$revenue=array("total"=>0);

$check=mysqli_query($conn,"SHOW TABLES LIKE 'bills'");

if(mysqli_num_rows($check)>0){

    $column=mysqli_query($conn,"SHOW COLUMNS FROM bills LIKE 'total_amount'");

    if(mysqli_num_rows($column)>0){

        $result=mysqli_query($conn,"SELECT SUM(total_amount) AS total FROM bills");

        if($result){
            $revenue=mysqli_fetch_assoc($result);
        }

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li class="active">
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<i class="fa-solid fa-user-doctor"></i>
<a href="../doctor/doctors.php">Doctors</a>
</li>

<li>
<i class="fa-solid fa-bed"></i>
<a href="../patient/patients.php">Patients</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="../appointment/appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-flask"></i>
<a href="../laboratory/laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-pills"></i>
<a href="../pharmacy/pharmacy.php">Pharmacy</a>
</li>

<li>
<i class="fa-solid fa-boxes-stacked"></i>
<a href="../inventory/inventory.php">Inventory</a>
</li>

<li>
<i class="fa-solid fa-file-invoice-dollar"></i>
<a href="../billing/billing.php">Billing</a>
</li>

<li>
<i class="fa-solid fa-users"></i>
<a href="../staff/staff.php">Staff</a>
</li>

<li>
<i class="fa-solid fa-comments"></i>
<a href="../feedback/feedback.php">Feedback</a>
</li>

<li>
<i class="fa-solid fa-chart-column"></i>
<a href="../reports/reports.php">Reports</a>
</li>

<li>
<i class="fa-solid fa-gear"></i>
<a href="../settings/settings.php">Settings</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Admin Dashboard</h2>

<div class="top-icons">

<i class="fa-solid fa-bell"></i>

<i class="fa-solid fa-envelope"></i>

<i class="fa-solid fa-user-circle"></i>

</div>

</div>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-user-doctor"></i>

<h2><?php echo $doctor['total']; ?></h2>

<p>Total Doctors</p>

</div>

<div class="card green">

<i class="fa-solid fa-bed"></i>

<h2><?php echo $patient['total']; ?></h2>

<p>Total Patients</p>

</div>

<div class="card orange">

<i class="fa-solid fa-calendar-check"></i>

<h2><?php echo $appointment['total']; ?></h2>

<p>Appointments</p>

</div>

<div class="card red">

<i class="fa-solid fa-money-bill-wave"></i>

<h2>Rs. <?php echo $revenue['total'] ?? 0; ?></h2>

<p>Revenue</p>

</div>

</div>

<div class="table-box">

<div class="quick-actions">

<div class="schedule">

<h2>Today's Schedule</h2>

<?php

$today = date("Y-m-d");

$schedule = mysqli_query($conn,"
SELECT *
FROM appointments
WHERE appointment_date='$today'
ORDER BY appointment_time ASC
LIMIT 5
");

if(mysqli_num_rows($schedule)>0){

while($row=mysqli_fetch_assoc($schedule)){

?>

<div class="schedule-item">

<?php echo date("h:i A",strtotime($row['appointment_time'])); ?>

<span>

<?php echo $row['doctor_name']; ?>

- <?php echo $row['patient_name']; ?>

</span>

</div>

<?php

}

}else{

?>

<div class="schedule-item">

No Appointments Today

</div>

<?php } ?>

</div>


<div class="action-card"
onclick="window.location='../doctor/add_doctor.php'">

<i class="fa-solid fa-user-plus"></i>

<h3>Add Doctor</h3>

</div>


<div class="action-card"
onclick="window.location='../patient/add_patient.php'">

<i class="fa-solid fa-hospital-user"></i>

<h3>Add Patient</h3>

</div>


<div class="action-card"
onclick="window.location='../appointment/add_appointment.php'">

<i class="fa-solid fa-calendar-plus"></i>

<h3>New Appointment</h3>

</div>


<div class="action-card"
onclick="window.location='../reports/reports.php'">

<i class="fa-solid fa-file-medical"></i>

<h3>Hospital Report</h3>

</div>

</div>


<h2>Recent Appointments</h2>

<table>

<thead>

<tr>

<th>Patient</th>

<th>Doctor</th>

<th>Date</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$sql = "SELECT *
FROM appointments
ORDER BY id DESC
LIMIT 5";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td>

<?php

if($row['status']=="Completed"){

?>

<span class="active">

<?php echo $row['status']; ?>

</span>

<?php

}elseif($row['status']=="Pending"){

?>

<span class="pending">

<?php echo $row['status']; ?>

</span>

<?php

}else{

?>

<span class="inactive">

<?php echo $row['status']; ?>

</span>

<?php } ?>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="4" style="text-align:center;padding:20px;">

No Recent Appointments

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<script src="../assets/js/dashboard.js"></script>

</body>

</html>

<footer>

© 2026 Subhan Care Hospital Management System

</footer>

