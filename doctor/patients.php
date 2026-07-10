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

$sql = "SELECT DISTINCT p.*
FROM patients p
INNER JOIN appointments a
ON p.full_name = a.patient_name
WHERE a.doctor_name='$doctorName'
ORDER BY p.full_name ASC";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>My Patients</title>

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

<li class="active">
<i class="fa-solid fa-bed"></i>
<a href="patients.php">My Patients</a>
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

<div class="topbar">

<h2>My Patients</h2>

</div>

<div class="table-box">

<table>

<tr>

<th>Photo</th>

<th>Patient Name</th>

<th>Email</th>

<th>Phone</th>

<th>Gender</th>

<th>Blood Group</th>

<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<img src="../assets/uploads/patients/<?php echo $row['photo']; ?>"

width="50"

height="50"

style="border-radius:50%;object-fit:cover;">

</td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['blood_group']; ?></td>

<td class="action-buttons">

<a href="patient_details.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

<a href="../reports/patient_report.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-file-medical edit"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="7" style="text-align:center;">

No Patients Found

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