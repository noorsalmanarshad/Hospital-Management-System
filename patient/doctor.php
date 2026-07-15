<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email = $_SESSION['patient_email'];

// Patient ka naam nikaalo
$patient = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM patients WHERE email='$email'"));

$patientName = $patient['full_name'];

// Appointment nikaalo
$sql = "SELECT * FROM appointments
        WHERE patient_name='$patientName'
        ORDER BY appointment_date DESC
        LIMIT 1";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>My Doctor</title>

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

<li class="active">
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

<li>
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

<h2>My Doctor</h2>

</div>

<div class="profile-card">

<?php

if(mysqli_num_rows($result)>0){

?>

<h2 style="margin-bottom:25px;">

<i class="fa-solid fa-user-doctor"></i>

Dr. <?php echo $row['doctor_name']; ?>

</h2>

<table class="profile-table">

<tr>

<td><b>Doctor Name</b></td>

<td><?php echo $row['doctor_name']; ?></td>

</tr>

<tr>

<td><b>Appointment Date</b></td>

<td><?php echo $row['appointment_date']; ?></td>

</tr>

<tr>

<td><b>Appointment Time</b></td>

<td><?php echo $row['appointment_time']; ?></td>

</tr>

<tr>

<td><b>Status</b></td>

<td>

<span class="<?php echo ($row['status']=="Completed") ? "active":"pending"; ?>">

<?php echo $row['status']; ?>

</span>

</td>

</tr>

</table>

<?php

}else{

?>

<div style="text-align:center;padding:40px;">

<i class="fa-solid fa-user-doctor"
style="font-size:70px;color:#999;"></i>

<h2>No Doctor Assigned</h2>

<p>No appointment found for your account.</p>

</div>

<?php

}

?>

</div>

</div>

</body>

</html>