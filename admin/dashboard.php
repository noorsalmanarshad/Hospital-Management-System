<?php

session_start();

if($_SESSION['role']!="Admin"){

    header("Location: ../auth/login.php");
    exit();

}

?>

<!DOCTYPE html>

<html>

<head>

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
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-pills"></i>
<a href="pharmacy.php">Pharmacy</a>
</li>

<li>
<i class="fa-solid fa-file-invoice-dollar"></i>
<a href="billing.php">Billing</a>
</li>

<li>
<i class="fa-solid fa-chart-line"></i>
<a href="reports.php">Reports</a>
</li>

<li>
<i class="fa-solid fa-gear"></i>
<a href="settings.php">Settings</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>


</div>

<div class="main">

<h1>Welcome Admin</h1>

    <div class="topbar">

    <div>

        <h2>Admin Dashboard</h2>

    </div>

    <div class="top-icons">

        <i class="fa-solid fa-bell"></i>

        <i class="fa-solid fa-envelope"></i>

        <i class="fa-solid fa-user-circle"></i>

    </div>

</div>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-user-doctor"></i>

<h2>25</h2>

<p>Total Doctors</p>

</div>

<div class="card green">

<i class="fa-solid fa-bed"></i>

<h2>150</h2>

<p>Total Patients</p>

</div>

<div class="card orange">

<i class="fa-solid fa-calendar-check"></i>

<h2>40</h2>

<p>Appointments</p>

</div>

<div class="card red">

<i class="fa-solid fa-money-bill-wave"></i>

<h2>$12,500</h2>

<p>Revenue</p>

</div>

</div>

<div class="table-box">

<div class="quick-actions">
    <div class="schedule">

<h2>Today's Schedule</h2>

<div class="schedule-item">

09:00 AM

<span>Dr Ahmed - General Checkup</span>

</div>

<div class="schedule-item">

11:30 AM

<span>Dr Hassan - Surgery</span>

</div>

<div class="schedule-item">

02:00 PM

<span>Patient Follow-up</span>

</div>

</div>

    <div class="action-card">

        <i class="fa-solid fa-user-plus"></i>

        <h3>Add Doctor</h3>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-hospital-user"></i>

        <h3>Add Patient</h3>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-calendar-plus"></i>

        <h3>New Appointment</h3>

    </div>

    <div class="action-card">

        <i class="fa-solid fa-file-medical"></i>

        <h3>Lab Report</h3>

    </div>

</div>

<h2>Recent Appointments</h2>

<table>

<tr>

<th>Patient</th>

<th>Doctor</th>

<th>Date</th>

<th>Status</th>

</tr>

<tr>

<td>Ali Khan</td>

<td>Dr Ahmed</td>

<td>06 July</td>

<td><span class="active">Completed</span></td>

</tr>

<tr>

<td>Sara Ali</td>

<td>Dr Hassan</td>

<td>07 July</td>

<td><span class="pending">Pending</span></td>

</tr>

</table>


</div>

</div>
<script src="../assets/js/dashboard.js"></script>
</body>

</html>
<footer>

© 2026 Subhan Care Hospital Management System

</footer>