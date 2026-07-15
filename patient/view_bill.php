<?php

session_start();

if(!isset($_SESSION['patient_email'])){
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

<title>View Bill</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Patient Panel</h2>

<ul>

<li>
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

<li class="active">
<i class="fa-solid fa-money-bill"></i>
<a href="bills.php">Bills</a>
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

<h2>Bill Details</h2>

</div>

<div class="profile-card">

<h2 style="margin-bottom:25px;">

<i class="fa-solid fa-file-invoice-dollar"></i>

Hospital Bill

</h2>

<table class="profile-table">

<tr>

<td><b>Patient Name</b></td>

<td><?php echo $row['patient_name']; ?></td>

</tr>

<tr>

<td><b>Doctor Name</b></td>

<td><?php echo $row['doctor_name']; ?></td>

</tr>

<tr>

<td><b>Consultation Fee</b></td>

<td>Rs. <?php echo number_format($row['consultation_fee']); ?></td>

</tr>

<tr>

<td><b>Laboratory Charges</b></td>

<td>Rs. <?php echo number_format($row['lab_charges']); ?></td>

</tr>

<tr>

<td><b>Medicine Charges</b></td>

<td>Rs. <?php echo number_format($row['medicine_charges']); ?></td>

</tr>

<tr>

<td><b>Other Charges</b></td>

<td>Rs. <?php echo number_format($row['other_charges']); ?></td>

</tr>

<tr style="background:#f1f5f9;">

<td><b>Total Amount</b></td>

<td>

<b style="color:#16a34a;">

Rs. <?php echo number_format($row['total_amount']); ?>

</b>

</td>

</tr>

<tr>

<td><b>Payment Status</b></td>

<td>

<span class="<?php echo ($row['payment_status']=="Paid") ? "active":"pending"; ?>">

<?php echo $row['payment_status']; ?>

</span>

</td>

</tr>

<tr>

<td><b>Bill Date</b></td>

<td><?php echo $row['bill_date']; ?></td>

</tr>

</table>

<br>

<a href="bills.php" class="save-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

</div>

</body>

</html>