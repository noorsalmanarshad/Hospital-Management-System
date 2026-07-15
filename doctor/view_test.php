<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM laboratory_tests WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>View Laboratory Report</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Laboratory Report</h2>

</div>

<div class="form-container">

<p><b>Patient Name:</b> <?php echo $row['patient_name']; ?></p>

<p><b>Doctor Name:</b> <?php echo $row['doctor_name']; ?></p>

<p><b>Test Name:</b> <?php echo $row['test_name']; ?></p>

<p><b>Test Date:</b> <?php echo $row['test_date']; ?></p>

<p><b>Result:</b> <?php echo $row['result']; ?></p>

<p><b>Blood Group:</b> <?php echo $row['blood_group']; ?></p>

<p><b>Hemoglobin:</b> <?php echo $row['hemoglobin']; ?></p>

<p><b>Blood Sugar:</b> <?php echo $row['sugar_level']; ?></p>

<p><b>Blood Pressure:</b> <?php echo $row['blood_pressure']; ?></p>

<p><b>Remarks:</b></p>

<textarea rows="5" readonly style="width:100%;"><?php echo $row['remarks']; ?></textarea>

<br><br>

<a href="laboratory.php" class="save-btn">
Back
</a>

</div>

</div>

</body>

</html>