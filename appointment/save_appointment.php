<?php

include("../config/database.php");

$patient = $_POST['patient_name'];
$doctor = $_POST['doctor_name'];
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO appointments
(patient_name,doctor_name,appointment_date,appointment_time)
VALUES
('$patient','$doctor','$date','$time')";

if(mysqli_query($conn,$sql)){
    header("Location: appointments.php");
}else{
    echo mysqli_error($conn);
}

?>