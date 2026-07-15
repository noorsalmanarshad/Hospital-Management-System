<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['patient_email'];

$patient=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM patients WHERE email='$email'")
);

$patientName=$patient['full_name'];

$sql="SELECT *
FROM laboratory_tests
WHERE patient_name='$patientName'
ORDER BY test_date DESC";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Laboratory Reports</title>

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

<li class="active">
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

<h2>My Laboratory Reports</h2>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>

<th>Test</th>

<th>Date</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['test_name']; ?></td>

<td><?php echo $row['test_date']; ?></td>

<td>

<span class="<?php echo ($row['result']=="Completed") ? "active":"pending"; ?>">

<?php echo $row['result']; ?>

</span>

</td>

<td>

<a href="view_report.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" style="text-align:center;padding:20px;">

No Laboratory Reports Found

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>