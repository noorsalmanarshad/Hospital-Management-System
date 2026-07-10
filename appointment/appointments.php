<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<title>Appointments</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h2>Subhan Care</h2>

    <ul>

        <li>
            <i class="fa-solid fa-house"></i>
            <a href="../admin/dashboard.php">Dashboard</a>
        </li>

        <li class="active">
            <i class="fa-solid fa-calendar-check"></i>
            <a href="appointments.php">Appointments</a>
        </li>

        <li>
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="../auth/logout.php">Logout</a>
        </li>

    </ul>

</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">

<h2>Appointments</h2>

<a href="add_appointment.php" class="add-btn">
<i class="fa-solid fa-plus"></i> Add Appointment
</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php
$sql = "SELECT * FROM appointments ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['appointment_date']; ?></td>
<td><?php echo $row['appointment_time']; ?></td>

<td>
<span class="active">
<?php echo $row['status']; ?>
</span>
</td>

<td class="action-buttons">

<a href="edit_appointment.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_appointment.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this appointment?')">

<i class="fa-solid fa-trash delete"></i>

</a>

</td>

</tr>

<?php } } else { ?>

<tr>
<td colspan="7" style="text-align:center;">No Appointments Found</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>