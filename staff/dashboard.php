<?php

session_start();

if(!isset($_SESSION['staff_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email = $_SESSION['staff_email'];

$sql = "SELECT * FROM staff WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$staff = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Staff Dashboard</title>

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

<div style="display:flex;align-items:center;gap:20px;">

<img src="../assets/uploads/staff/<?php echo $staff['photo']; ?>"

width="90"

height="90"

style="border-radius:50%;object-fit:cover;border:3px solid #2563EB;">

<div>

<h2>

<?php echo $staff['full_name']; ?>

</h2>

<h3 style="color:#2563EB;">

<?php echo $staff['role']; ?>

</h3>

<p><b>Email:</b> <?php echo $staff['email']; ?></p>

<p><b>Contact:</b> <?php echo $staff['contact']; ?></p>

<p><b>Shift:</b> <?php echo $staff['shift']; ?></p>

<p>

<b>Status:</b>

<?php echo $staff['duty_status']; ?>

</p>

</div>

</div>

</div>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-money-bill-wave"></i>

<h2>Rs. <?php echo $staff['salary']; ?></h2>

<p>Salary</p>

</div>

<div class="card green">

<i class="fa-solid fa-clock"></i>

<h2><?php echo $staff['working_hours']; ?></h2>

<p>Working Hours</p>

</div>

<div class="card orange">

<i class="fa-solid fa-business-time"></i>

<h2><?php echo $staff['work_duration']; ?></h2>

<p>Work Duration</p>

</div>

</div>

<div class="table-box">

<h2>Staff Information</h2>

<table>

<tr>

<th>Field</th>

<th>Information</th>

</tr>

<tr>

<td>Gender</td>

<td><?php echo $staff['gender']; ?></td>

</tr>

<tr>

<td>Date of Birth</td>

<td><?php echo $staff['dob']; ?></td>

</tr>

<tr>

<td>CNIC</td>

<td><?php echo $staff['cnic']; ?></td>

</tr>

<tr>

<td>Address</td>

<td><?php echo $staff['address']; ?></td>

</tr>

<tr>

<td>Previous Job</td>

<td><?php echo $staff['previous_job']; ?></td>

</tr>

<tr>

<td>Join Date</td>

<td><?php echo $staff['join_date']; ?></td>

</tr>

</table>

</div>

</div>

</body>

</html>