<?php

session_start();

if(!isset($_SESSION['doctor_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email = $_SESSION['doctor_email'];

/* Get Doctor Name */

$doctor = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM doctors WHERE email='$email'")
);

$doctorName = $doctor['full_name'];

/* Form Data */

$patient_name = $_POST['patient_name'];
$medicine = $_POST['medicine'];
$dosage = $_POST['dosage'];
$duration = $_POST['duration'];
$instructions = $_POST['instructions'];

$date = date("Y-m-d");

/* Save */

$sql = "INSERT INTO prescriptions
(patient_name,doctor_name,medicine,dosage,duration,instructions,prescription_date)

VALUES

('$patient_name',
'$doctorName',
'$medicine',
'$dosage',
'$duration',
'$instructions',
'$date')";

if(mysqli_query($conn,$sql)){

header("Location: prescriptions.php");

}else{

echo mysqli_error($conn);

}

?>