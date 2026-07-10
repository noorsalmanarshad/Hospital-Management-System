<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM bills WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Bill</title>

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

<h2>Edit Bill</h2>

</div>

<div class="form-container">

<form action="update_bill.php" method="POST">

<input type="hidden" name="id"
value="<?php echo $row['id']; ?>">

<div class="row">

<div class="input-box">

<label>Patient Name</label>

<input type="text"
name="patient_name"
value="<?php echo $row['patient_name']; ?>"
required>

</div>

<div class="input-box">

<label>Doctor Name</label>

<input type="text"
name="doctor_name"
value="<?php echo $row['doctor_name']; ?>"
required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Consultation Fee</label>

<input type="number"
id="consultation_fee"
name="consultation_fee"
value="<?php echo $row['consultation_fee']; ?>"
onkeyup="calculateTotal()">

</div>

<div class="input-box">

<label>Lab Charges</label>

<input type="number"
id="lab_charges"
name="lab_charges"
value="<?php echo $row['lab_charges']; ?>"
onkeyup="calculateTotal()">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Medicine Charges</label>

<input type="number"
id="medicine_charges"
name="medicine_charges"
value="<?php echo $row['medicine_charges']; ?>"
onkeyup="calculateTotal()">

</div>

<div class="input-box">

<label>Other Charges</label>

<input type="number"
id="other_charges"
name="other_charges"
value="<?php echo $row['other_charges']; ?>"
onkeyup="calculateTotal()">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Total Amount</label>

<input type="number"
id="total_amount"
name="total_amount"
value="<?php echo $row['total_amount']; ?>"
readonly>

</div>

<div class="input-box">

<label>Payment Status</label>

<select name="payment_status">

<option value="Paid"
<?php if($row['payment_status']=="Paid") echo "selected"; ?>>
Paid
</option>

<option value="Pending"
<?php if($row['payment_status']=="Pending") echo "selected"; ?>>
Pending
</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Bill Date</label>

<input type="date"
name="bill_date"
value="<?php echo $row['bill_date']; ?>"
required>

</div>

</div>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Update Bill

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

document.getElementById("total_amount").value =
consultation + lab + medicine + other;

}

</script>

</body>

</html>