<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['doctor_email'];

$doctor=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM doctors WHERE email='$email'")
);

$doctorName=$doctor['full_name'];

$result=mysqli_query($conn,"
SELECT * FROM prescriptions
WHERE doctor_name='$doctorName'
ORDER BY id DESC
");

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Prescriptions</title>

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

<li>
<i class="fa-solid fa-flask"></i>
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

<h2>Prescriptions</h2>

<a href="add_prescription.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

New Prescription

</a>

</div>

<div class="table-box">

<table>

<tr>

<th>ID</th>

<th>Patient</th>

<th>Medicine</th>

<th>Date</th>

<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['medicine']; ?></td>

<td><?php echo $row['prescription_date']; ?></td>

<td class="action-buttons">

<a href="view_prescription.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" style="text-align:center;">

No Prescriptions Found

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>