<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM appointments WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Appointment</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- MAIN -->

<div class="main">

<div class="topbar">

<h2>Edit Appointment</h2>

</div>

<div class="form-container">

<form action="update_appointment.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

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

<label>Date</label>

<input type="date"
name="appointment_date"
value="<?php echo $row['appointment_date']; ?>"
required>

</div>

<div class="input-box">

<label>Time</label>

<input type="time"
name="appointment_time"
value="<?php echo $row['appointment_time']; ?>"
required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Status</label>

<select name="status">

<option value="Pending"
<?php if($row['status']=="Pending") echo "selected"; ?>>
Pending
</option>

<option value="Completed"
<?php if($row['status']=="Completed") echo "selected"; ?>>
Completed
</option>

<option value="Cancelled"
<?php if($row['status']=="Cancelled") echo "selected"; ?>>
Cancelled
</option>

</select>

</div>

</div>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Update Appointment

</button>

</form>

</div>

</div>

</body>

</html>