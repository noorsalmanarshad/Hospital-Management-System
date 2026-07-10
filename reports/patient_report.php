<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

/* Patient Details */

$sql = "SELECT * FROM patients WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){

die("Patient Not Found");

}

$patient = mysqli_fetch_assoc($result);

/* Appointment (Latest) */

$appointment = mysqli_query($conn,"
SELECT *
FROM appointments
WHERE patient_name='".$patient['full_name']."'
ORDER BY id DESC
LIMIT 1");

$app = mysqli_fetch_assoc($appointment);

/* Laboratory (Latest) */

$laboratory = mysqli_query($conn,"
SELECT *
FROM laboratory_tests
WHERE patient_name='".$patient['full_name']."'
ORDER BY id DESC
LIMIT 1");

$lab = mysqli_fetch_assoc($laboratory);

/* Bill (Latest) */

$bill = mysqli_query($conn,"
SELECT *
FROM bills
WHERE patient_name='".$patient['full_name']."'
ORDER BY id DESC
LIMIT 1");

$billing = mysqli_fetch_assoc($bill);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Patient Medical Report</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

*{

margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;

}

body{

background:#ececec;
padding:30px;

}

.report{

width:900px;
margin:auto;
background:white;
padding:40px;
box-shadow:0 0 15px rgba(0,0,0,.2);

}

.header{

display:flex;
justify-content:space-between;
align-items:center;
border-bottom:4px solid #2563eb;
padding-bottom:20px;

}

.logo{

font-size:60px;
color:#2563eb;

}

.hospital h1{

color:#2563eb;
font-size:34px;

}

.hospital p{

margin-top:5px;
color:#666;

}

.title{

text-align:center;
margin:30px 0;

}

.title h2{

color:#222;
font-size:28px;

}

.section-title{

background:#2563eb;
color:white;
padding:10px;
margin-top:25px;
margin-bottom:15px;
font-size:18px;

}

table{

width:100%;
border-collapse:collapse;

}

table td{

border:1px solid #ddd;
padding:12px;

}

.label{

font-weight:bold;
background:#f4f4f4;
width:220px;

}

.print{

margin-top:30px;
text-align:center;

}

.print button{

padding:12px 25px;
background:#2563eb;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
font-size:17px;

}

@media print{

.print{

display:none;

}

body{

background:white;

}

.report{

box-shadow:none;

}

}

</style>

</head>

<body>

<div class="report">

<div class="header">

<div class="logo">

<i class="fa-solid fa-hospital"></i>

</div>

<div class="hospital">

<h1>SUBHAN CARE HOSPITAL</h1>

<p>Hospital Management System</p>

<p>GT Road, Gujrat, Pakistan</p>

</div>

</div>

<div class="title">

<h2>PATIENT MEDICAL REPORT</h2>

</div>

<div class="section-title">

Patient Information

</div>

<table>

<tr>

<td class="label">Patient ID</td>

<td><?php echo $patient['id']; ?></td>

</tr>

<tr>

<td class="label">Patient Name</td>

<td><?php echo $patient['full_name']; ?></td>

</tr>

<tr>

<td class="label">Gender</td>

<td><?php echo $patient['gender']; ?></td>

</tr>

<tr>

<td class="label">Blood Group</td>

<td><?php echo $patient['blood_group']; ?></td>

</tr>

<tr>

<td class="label">Phone</td>

<td><?php echo $patient['phone']; ?></td>

</tr>

<tr>

<td class="label">Email</td>

<td><?php echo $patient['email']; ?></td>

</tr>

<tr>

<td class="label">Address</td>

<td><?php echo $patient['address']; ?></td>

</tr>

</table>

<!-- Doctor Information -->

<div class="section-title">

Doctor Information

</div>

<table>

<tr>

<td class="label">Doctor Name</td>

<td>

<?php

if($app){

echo $app['doctor_name'];

}else{

echo "Not Available";

}

?>

</td>

</tr>

<tr>

<td class="label">Appointment Date</td>

<td>

<?php

if($app){

echo $app['appointment_date'];

}else{

echo "Not Available";

}

?>

</td>

</tr>

<tr>

<td class="label">Appointment Time</td>

<td>

<?php

if($app){

echo $app['appointment_time'];

}else{

echo "Not Available";

}

?>

</td>

</tr>

<tr>

<td class="label">Status</td>

<td>

<?php

if($app){

echo $app['status'];

}else{

echo "Pending";

}

?>

</td>

</tr>

</table>


<!-- Laboratory Report -->

<div class="section-title">

Laboratory Report

</div>

<table>

<tr>

<td class="label">Test Name</td>

<td>

<?php

echo $lab['test_name'] ?? "Not Available";

?>

</td>

</tr>

<tr>

<td class="label">Blood Group</td>

<td>

<?php

echo $lab['blood_group'] ?? $patient['blood_group'];

?>

</td>

</tr>

<tr>

<td class="label">Hemoglobin (Hb)</td>

<td>

<?php

echo $lab['hemoglobin'] ?? "Not Available";

?>

</td>

</tr>

<tr>

<td class="label">Sugar Level</td>

<td>

<?php

echo $lab['sugar_level'] ?? "Not Available";

?>

</td>

</tr>

<tr>

<td class="label">Blood Pressure</td>

<td>

<?php

echo $lab['blood_pressure'] ?? "Not Available";

?>

</td>

</tr>

<tr>

<td class="label">Result</td>

<td>

<?php

echo $lab['result'] ?? "Pending";

?>

</td>

</tr>

<tr>

<td class="label">Remarks</td>

<td>

<?php

echo $lab['remarks'] ?? "No Remarks";

?>

</td>

</tr>

</table>


<!-- Billing Information -->

<div class="section-title">

Billing Information

</div>

<table>

<tr>

<td class="label">Consultation Fee</td>

<td>

Rs.

<?php

echo $billing['consultation_fee'] ?? 0;

?>

</td>

</tr>

<tr>

<td class="label">Lab Charges</td>

<td>

Rs.

<?php

echo $billing['lab_charges'] ?? 0;

?>

</td>

</tr>

<tr>

<td class="label">Medicine Charges</td>

<td>

Rs.

<?php

echo $billing['medicine_charges'] ?? 0;

?>

</td>

</tr>

<tr>

<td class="label">Other Charges</td>

<td>

Rs.

<?php

echo $billing['other_charges'] ?? 0;

?>

</td>

</tr>

<tr>

<td class="label"><strong>Total Bill</strong></td>

<td>

<strong>

Rs.

<?php

echo $billing['total_amount'] ?? 0;

?>

</strong>

</td>

</tr>

<tr>

<td class="label">Payment Status</td>

<td>

<?php

echo $billing['payment_status'] ?? "Pending";

?>

</td>

</tr>

</table>

<!-- Doctor Notes -->

<div class="section-title">

Doctor's Notes

</div>

<table>

<tr>

<td style="height:120px;">

Patient is advised to take medicines regularly, follow the prescribed diet,
and visit the hospital for follow-up according to the doctor's instructions.

</td>

</tr>

</table>


<!-- Signatures -->

<div style="margin-top:60px;
display:flex;
justify-content:space-between;
align-items:center;">

<div style="text-align:center;">

<div style="border-top:2px solid #000;
width:220px;
margin:auto;"></div>

<p style="margin-top:10px;"><strong>Doctor Signature</strong></p>

</div>

<div style="text-align:center;">

<div style="border-top:2px solid #000;
width:220px;
margin:auto;"></div>

<p style="margin-top:10px;"><strong>Lab Technician</strong></p>

</div>

<div style="text-align:center;">

<div style="border-top:2px solid #000;
width:220px;
margin:auto;"></div>

<p style="margin-top:10px;"><strong>Hospital Stamp</strong></p>

</div>

</div>


<!-- Footer -->

<div style="margin-top:50px;
padding:20px;
background:#f5f5f5;
border-left:5px solid #2563eb;">

<p>

<strong>Report Generated On:</strong>

<?php echo date("d-m-Y"); ?>

&nbsp;&nbsp;&nbsp;

<strong>Time:</strong>

<?php echo date("h:i A"); ?>

</p>

<br>

<p>

<strong>Generated By:</strong>

<?php echo $_SESSION['role']; ?>

</p>

<br>

<p>

This is a computer-generated medical report from
<strong>Subhan Care Hospital Management System.</strong>

Any alteration or unauthorized modification of this report is prohibited.

</p>

</div>


<!-- Print Button -->

<div class="print">

<button onclick="window.print()">

<i class="fa-solid fa-print"></i>

Print Medical Report

</button>

</div>

</div>

</body>

</html>