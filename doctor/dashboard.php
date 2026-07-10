<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email = $_SESSION['doctor_email'];

$sql = "SELECT * FROM doctors WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$doctor = mysqli_fetch_assoc($result);

$doctorName = $doctor['full_name'];

/* Total Patients */
$sql = "SELECT COUNT(DISTINCT patient_name) AS total
        FROM appointments
        WHERE doctor_name='$doctorName'";
$result = mysqli_query($conn,$sql);
$patient = mysqli_fetch_assoc($result);

/* Total Appointments */
$sql = "SELECT COUNT(*) AS total
        FROM appointments
        WHERE doctor_name='$doctorName'";
$result = mysqli_query($conn,$sql);
$appointment = mysqli_fetch_assoc($result);

/* Lab Reports */
$sql = "SELECT COUNT(*) AS total FROM laboratory_tests";
$result = mysqli_query($conn,$sql);

if($result){
    $lab = mysqli_fetch_assoc($result);
}else{
    $lab = ['total'=>0];
}

/* Prescriptions */

$sql = "SELECT COUNT(*) AS total
        FROM prescriptions
        WHERE doctor_name='$doctorName'";

$result = mysqli_query($conn,$sql);

if($result){
    $prescription = mysqli_fetch_assoc($result);
}else{
    $prescription['total']=0;
}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Doctor Dashboard</title>

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
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-bed"></i>
<a href="patients.php">Patients</a>
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
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="profile-card">

<div class="profile-left">

<?php
$image="../assets/uploads/doctors/".$doctor['photo'];

if(!empty($doctor['photo']) && file_exists($image)){
?>

<img src="<?php echo $image; ?>" class="doctor-img">

<?php } else { ?>

<img src="../assets/images/doctor-avatar.png" class="doctor-img">

<?php } ?>

</div>

<div class="profile-right">

<h2>
Dr. <?php echo $doctor['full_name']; ?>
</h2>

<h4>
<?php echo $doctor['department']; ?> Specialist
</h4>

<p>
<b>Email:</b>
<?php echo $doctor['email']; ?>
</p>

<p>
<b>Phone:</b>
<?php echo $doctor['phone']; ?>
</p>

<p>
<b>Address:</b>
<?php echo $doctor['address']; ?>
</p>

<p>
<b>Gender:</b>
<?php echo $doctor['gender']; ?>
</p>

<p>
<b>Date of Birth:</b>
<?php echo $doctor['dob']; ?>
</p>

</div>

<div class="top-icons">

<i class="fa-solid fa-bell"></i>

<i class="fa-solid fa-envelope"></i>

</div>

</div>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-bed"></i>

<h2><?php echo $patient['total']; ?></h2>

<p>Total Patients</p>

</div>

<div class="card green">

<i class="fa-solid fa-calendar-check"></i>

<h2><?php echo $appointment['total']; ?></h2>

<p>Appointments</p>

</div>

<div class="card orange">

<i class="fa-solid fa-flask"></i>

<h2><?php echo $lab['total']; ?></h2>

<p>Lab Reports</p>

</div>

<div class="card red">

<i class="fa-solid fa-file-prescription"></i>

<h2><?php echo $prescription['total']; ?></h2>

<p>Prescriptions</p>

</div>

</div>

<div class="table-box">

<h2>Today's Appointments</h2>

<table>

<tr>

<th>Patient</th>

<th>Date</th>

<th>Status</th>

</tr>
<?php

$result = mysqli_query($conn,
"SELECT * FROM appointments
WHERE doctor_name='$doctorName'
ORDER BY appointment_date ASC
LIMIT 5");

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td>

<span class="<?php echo ($row['status']=="Completed") ? "active":"pending"; ?>">

<?php echo $row['status']; ?>

</span>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="3" style="text-align:center;">
No Appointments Found
</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

<footer>

© 2026 Subhan Care Hospital Management System

</footer>

</body>

</html>