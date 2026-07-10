<?php

include("../config/database.php");

$id=$_POST['id'];

$patient=$_POST['patient_name'];

$doctor=$_POST['doctor_name'];

$date=$_POST['date'];

$time=$_POST['time'];

$sql="UPDATE appointments SET

patient_name='$patient',

doctor_name='$doctor',

appointment_date='$date',

appointment_time='$time'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: appointments.php");

}else{

echo mysqli_error($conn);

}

?>