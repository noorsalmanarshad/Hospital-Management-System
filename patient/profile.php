<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['patient_email'];

$sql="SELECT * FROM patients WHERE email='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>My Profile</title>

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

<li class="active">

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

<h2>My Profile</h2>

</div>

<div class="profile-card">

<div style="text-align:center;">

<?php

if($row['photo']!=""){

?>

<img src="../assets/uploads/patients/<?php echo $row['photo']; ?>"

width="140"

height="140"

style="border-radius:50%;object-fit:cover;">

<?php

}else{

?>

<img src="../assets/images/user.png"

width="140">

<?php

}

?>

<h2><?php echo $row['full_name']; ?></h2>

<p>Patient</p>

</div>

<hr><br>

<table class="profile-table">

<tr>

<td><b>Email</b></td>

<td><?php echo $row['email']; ?></td>

</tr>

<tr>

<td><b>Phone</b></td>

<td><?php echo $row['phone']; ?></td>

</tr>

<tr>

<td><b>Gender</b></td>

<td><?php echo $row['gender']; ?></td>

</tr>

<tr>

<td><b>Date of Birth</b></td>

<td><?php echo $row['dob']; ?></td>

</tr>

<tr>

<td><b>Blood Group</b></td>

<td><?php echo $row['blood_group']; ?></td>

</tr>

<tr>

<td><b>Address</b></td>

<td><?php echo $row['address']; ?></td>

</tr>

<tr>

<td><b>Registered On</b></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

</table>

</div>

</div>

</body>

</html>