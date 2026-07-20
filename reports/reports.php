<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

// Total Doctors
$doctors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM doctors"));

// Total Patients
$patients = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM patients"));

// Total Appointments
$appointments = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointments"));

// Total Laboratory Tests
$laboratory = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM laboratory_tests"));

// Total Medicines
$pharmacy = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM medicines"));

// Total Bills
$bills = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bills"));

// Total Revenue
$total = mysqli_query($conn,"SELECT SUM(total_amount) AS revenue FROM bills WHERE payment_status='Paid'");
$revenue = mysqli_fetch_assoc($total);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Reports</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

.report-box{

display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-top:20px;

}

.card{

background:#fff;
padding:25px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,.1);
text-align:center;

}

.card i{

font-size:40px;
color:#2563eb;
margin-bottom:15px;

}

.card h2{

font-size:32px;
margin:10px 0;

}

.card p{

font-size:18px;

}

.print-btn{

padding:12px 20px;
background:#2563eb;
color:#fff;
text-decoration:none;
border-radius:8px;

}

.topbar h2{
    color:#000;
}

.card h2{
    color:#000;
}

.card p{
    color:#333;
}

.card{
    background:#fff;
}

.print-btn{
    color:#fff;
}

</style>

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
<i class="fa-solid fa-chart-column"></i>
<a href="reports.php">Reports</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Hospital Reports</h2>

<a href="print_report.php" class="print-btn">

<i class="fa-solid fa-print"></i>

Print Report

</a>

</div>

<div class="report-box">

<div class="card">

<i class="fa-solid fa-user-doctor"></i>

<h2><?php echo $doctors; ?></h2>

<p>Total Doctors</p>

</div>

<div class="card">

<i class="fa-solid fa-bed"></i>

<h2><?php echo $patients; ?></h2>

<p>Total Patients</p>

</div>

<div class="card">

<i class="fa-solid fa-calendar-check"></i>

<h2><?php echo $appointments; ?></h2>

<p>Total Appointments</p>

</div>

<div class="card">

<i class="fa-solid fa-flask"></i>

<h2><?php echo $laboratory; ?></h2>

<p>Laboratory Tests</p>

</div>

<div class="card">

<i class="fa-solid fa-pills"></i>

<h2><?php echo $pharmacy; ?></h2>

<p>Medicines</p>

</div>

<div class="card">

<i class="fa-solid fa-money-bill-wave"></i>

<h2><?php echo $bills; ?></h2>

<p>Total Bills</p>

</div>

<div class="card">

<i class="fa-solid fa-sack-dollar"></i>

<h2>Rs. <?php echo $revenue['revenue'] ?? 0; ?></h2>

<p>Total Revenue</p>

</div>

</div>

</div>

</body>

</html>

