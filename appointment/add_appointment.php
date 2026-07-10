<?php
include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Appointment</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
            <i class="fa-solid fa-calendar-check"></i>
            <a href="appointments.php">Appointments</a>
        </li>

        <li>
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="../auth/logout.php">Logout</a>
        </li>

    </ul>

</div>


<div class="main">

<div class="topbar">
<h2>Add Appointment</h2>
</div>

<div class="form-container">

<form action="save_appointment.php" method="POST">

<div class="row">

<div class="input-box">
<label>Patient Name</label>
<input type="text" name="patient_name" required>
</div>

<div class="input-box">
<label>Doctor Name</label>
<input type="text" name="doctor_name" required>
</div>

</div>

<div class="row">

<div class="input-box">
<label>Date</label>
<input type="date" name="date" required>
</div>

<div class="input-box">
<label>Time</label>
<input type="time" name="time" required>
</div>

</div>

<button class="save-btn">Save Appointment</button>

</form>

</div>

</div>

</body>

</html>