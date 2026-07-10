<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Add Bill</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-file-invoice-dollar"></i>
<a href="billing.php">Billing</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- Main -->

<div class="main">

<div class="topbar">

<h2>Add New Bill</h2>

</div>

<div class="form-container">

<form action="save_bill.php" method="POST">

<div class="row">

<div class="input-box">

<label>Patient Name</label>

<input type="text" name="patient_name" required>

</div>

<div class="input-box">

<label>Doctor Name</label>

<input type="text" name="doctor_name" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Consultation Fee (Rs)</label>

<input type="number" id="consultation_fee"
name="consultation_fee"
value="0"
onkeyup="calculateTotal()"
required>

</div>

<div class="input-box">

<label>Lab Charges (Rs)</label>

<input type="number"
id="lab_charges"
name="lab_charges"
value="0"
onkeyup="calculateTotal()">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Medicine Charges (Rs)</label>

<input type="number"
id="medicine_charges"
name="medicine_charges"
value="0"
onkeyup="calculateTotal()">

</div>

<div class="input-box">

<label>Other Charges (Rs)</label>

<input type="number"
id="other_charges"
name="other_charges"
value="0"
onkeyup="calculateTotal()">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Total Amount (Rs)</label>

<input type="number"
id="total_amount"
name="total_amount"
readonly>

</div>

<div class="input-box">

<label>Payment Status</label>

<select name="payment_status">

<option>Paid</option>

<option>Pending</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Bill Date</label>

<input type="date"
name="bill_date"
required>

</div>

</div>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Save Bill

</button>

</form>

</div>

</div>

<script>

function calculateTotal(){

let consultation =
parseFloat(document.getElementById("consultation_fee").value)||0;

let lab =
parseFloat(document.getElementById("lab_charges").value)||0;

let medicine =
parseFloat(document.getElementById("medicine_charges").value)||0;

let other =
parseFloat(document.getElementById("other_charges").value)||0;

document.getElementById("total_amount").value=
consultation+lab+medicine+other;

}

calculateTotal();

</script>

</body>

</html>