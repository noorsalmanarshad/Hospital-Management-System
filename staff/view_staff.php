<?php

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM staff WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Staff Profile</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

.profile-card{

width:80%;

margin:30px auto;

background:#fff;

padding:30px;

border-radius:12px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}

.profile-header{

text-align:center;

margin-bottom:30px;

}

.profile-header img{

width:140px;

height:140px;

border-radius:50%;

object-fit:cover;

border:5px solid #2563EB;

}

.profile-header h2{

margin-top:15px;

}

.info{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:18px;

}

.info div{

padding:15px;

background:#f7f7f7;

border-radius:10px;

}

.info b{

color:#2563EB;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">

<i class="fa-solid fa-users"></i>

<a href="staff.php">Staff</a>

</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Staff Profile</h2>

</div>

<div class="profile-card">

<div class="profile-header">

<img src="../../assets/uploads/staff/<?php echo $row['photo']; ?>">

<h2><?php echo $row['full_name']; ?></h2>

<p><?php echo $row['role']; ?></p>

</div>

<div class="info">

<div>

<b>Email</b><br>

<?php echo $row['email']; ?>

</div>

<div>

<b>Contact Number</b><br>

<?php echo $row['contact']; ?>

</div>

<div>

<b>CNIC</b><br>

<?php echo $row['cnic']; ?>

</div>

<div>

<b>Gender</b><br>

<?php echo $row['gender']; ?>

</div>

<div>

<b>Date of Birth</b><br>

<?php echo $row['dob']; ?>

</div>

<div>

<b>Address</b><br>

<?php echo $row['address']; ?>

</div>

<div>

<b>Salary</b><br>

Rs. <?php echo $row['salary']; ?>

</div>

<div>

<b>Shift</b><br>

<?php echo $row['shift']; ?>

</div>

<div>

<b>Working Hours</b><br>

<?php echo $row['working_hours']; ?>

</div>

<div>

<b>Work Duration</b><br>

<?php echo $row['work_duration']; ?>

</div>

<div>

<b>Previous Experience</b><br>

<?php echo $row['previous_job']; ?>

</div>

<div>

<b>Join Date</b><br>

<?php echo $row['join_date']; ?>

</div>

<div>

<b>Duty Status</b><br>

<?php echo $row['duty_status']; ?>

</div>

</div>

</div>

</div>

</body>

</html>