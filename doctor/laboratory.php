<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email = $_SESSION['doctor_email'];

$doctor = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM doctors WHERE email='$email'")
);

$doctorName = $doctor['full_name'];

$sql = "SELECT *
FROM laboratory_tests
WHERE doctor_name='$doctorName'
ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

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

<h2>Doctor Panel</h2>

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
<i class="fa-solid fa-bed"></i>
<a href="patients.php">My Patients</a>
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
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Laboratory Reports</h2>

</div>

<div class="table-box">

<table>

<tr>

<th>ID</th>

<th>Patient</th>

<th>Test Name</th>

<th>Test Date</th>

<th>Status</th>

<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['test_name']; ?></td>

<td><?php echo $row['test_date']; ?></td>

<td>

<span class="<?php echo ($row['status']=="Completed") ? "active":"pending"; ?>">

<?php echo $row['status']; ?>

</span>

</td>

<td class="action-buttons">

<a href="lab_details.php?id=<?php echo $row['id']; ?>" title="View">

<i class="fa-solid fa-eye report"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="6" style="text-align:center;padding:20px;">
No Laboratory Reports Found
</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

</body>

</html>