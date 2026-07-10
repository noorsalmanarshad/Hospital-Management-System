<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM prescriptions WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Prescription Not Found");
}

$row = mysqli_fetch_assoc($result);

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

<h2>
<i class="fa-solid fa-user-doctor"></i>
Doctor Panel
</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-hospital-user"></i>
<a href="patients.php">My Patients</a>
</li>

<li>
<i class="fa-solid fa-flask-vial"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li class="active">
<i class="fa-solid fa-file-prescription"></i>
<a href="prescriptions.php">Prescriptions</a>
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

<div class="form-container">

<p><b>Patient:</b> <?php echo $row['patient_name']; ?></p>

<p><b>Doctor:</b> Dr. <?php echo $row['doctor_name']; ?></p>

<p><b>Medicine:</b> <?php echo $row['medicine']; ?></p>

<p><b>Dosage:</b> <?php echo $row['dosage']; ?></p>

<p><b>Duration:</b> <?php echo $row['duration']; ?></p>

<?php if(isset($row['instructions'])){ ?>

<p><b>Instructions:</b> <?php echo $row['instructions']; ?></p>

<?php } ?>

<p><b>Date:</b> <?php echo $row['prescription_date']; ?></p>

<br>

<a href="prescriptions.php" class="add-btn">
Back
</a>

</div>

</div>

</body>

</html>