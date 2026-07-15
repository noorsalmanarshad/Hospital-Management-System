<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Patient Details</title>

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

<h2>Patient Profile</h2>

</div>

<div class="form-container">

<div style="display:flex;gap:30px;align-items:center;">

<img src="../assets/uploads/patients/<?php echo $row['photo']; ?>"
width="160"
height="160"
style="border-radius:50%;object-fit:cover;border:4px solid #2563EB;">

<div>

<h2><?php echo $row['full_name']; ?></h2>

<p><b>Email:</b> <?php echo $row['email']; ?></p>

<p><b>Phone:</b> <?php echo $row['phone']; ?></p>

<p><b>Gender:</b> <?php echo $row['gender']; ?></p>

<p><b>Blood Group:</b> <?php echo $row['blood_group']; ?></p>

<p><b>Date of Birth:</b> <?php echo $row['dob']; ?></p>

<p><b>Address:</b> <?php echo $row['address']; ?></p>

</div>

</div>

</div>

<br>

<hr><br>

<h2>

<i class="fa-solid fa-notes-medical"></i>

Medical History

</h2>

<br>

<table class="profile-table">

<tr>

<td><b>Allergy</b></td>

<td><?php echo $row['allergy']; ?></td>

</tr>

<tr>

<td><b>Allergy Details</b></td>

<td><?php echo $row['allergy_details']; ?></td>

</tr>

<tr>

<td><b>Infection</b></td>

<td><?php echo $row['infection']; ?></td>

</tr>

<tr>

<td><b>Infection Details</b></td>

<td><?php echo $row['infection_details']; ?></td>

</tr>

<tr>

<td><b>Chronic Disease</b></td>

<td><?php echo $row['chronic_disease']; ?></td>

</tr>

<tr>

<td><b>Current Medicines</b></td>

<td><?php echo $row['current_medicines']; ?></td>

</tr>

<tr>

<td><b>Previous Surgeries</b></td>

<td><?php echo $row['previous_surgeries']; ?></td>

</tr>

<tr>

<td><b>Emergency Contact</b></td>

<td><?php echo $row['emergency_contact_name']; ?></td>

</tr>

<tr>

<td><b>Emergency Phone</b></td>

<td><?php echo $row['emergency_contact_phone']; ?></td>

</tr>

<tr>

<td><b>Medical Notes</b></td>

<td><?php echo nl2br($row['medical_notes']); ?></td>

</tr>

</table>

<div class="table-box">

<h2>Appointment History</h2>

<table>

<tr>

<th>Date</th>

<th>Doctor</th>

<th>Status</th>

</tr>

<?php

$history = mysqli_query($conn,
"SELECT * FROM appointments
WHERE patient_name='".$row['full_name']."'
ORDER BY appointment_date DESC");

if(mysqli_num_rows($history)>0){

while($a=mysqli_fetch_assoc($history)){

?>

<tr>

<td><?php echo $a['appointment_date']; ?></td>

<td><?php echo $a['doctor_name']; ?></td>

<td>

<span class="<?php echo ($a['status']=="Completed") ? "active":"pending"; ?>">

<?php echo $a['status']; ?>

</span>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="3" style="text-align:center;">
No Appointment History
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>

</html>