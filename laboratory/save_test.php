<?php

include("../config/database.php");

/* Form Data */

$patient = $_POST['patient_name'];
$doctorName = $_POST['doctor_name'];
$test = $_POST['test_name'];
$date = $_POST['test_date'];
$result = $_POST['result'];

$blood_group = $_POST['blood_group'];
$hemoglobin = $_POST['hemoglobin'];
$sugar_level = $_POST['sugar_level'];
$blood_pressure = $_POST['blood_pressure'];
$remarks = $_POST['remarks'];

/* Get Doctor Name Automatically */

$getDoctor = mysqli_query($conn,
"SELECT doctor_name
FROM appointments
WHERE patient_name='$patient'
ORDER BY appointment_date DESC
LIMIT 1");

$doctor = mysqli_fetch_assoc($getDoctor);

$doctorName = $doctor['doctor_name'];

/* Save Laboratory Report */

$sql = "INSERT INTO laboratory_tests
(patient_name,
doctor_name,
test_name,
test_date,
result,
blood_group,
hemoglobin,
sugar_level,
blood_pressure,
remarks)

VALUES

('$patient',
'$doctorName',
'$test',
'$date',
'$result',
'$blood_group',
'$hemoglobin',
'$sugar_level',
'$blood_pressure',
'$remarks')";

if(mysqli_query($conn,$sql)){

header("Location: laboratory.php");

}else{

echo mysqli_error($conn);

}

?>