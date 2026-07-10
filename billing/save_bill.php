<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$patient_name = $_POST['patient_name'];
$doctor_name = $_POST['doctor_name'];

$consultation_fee = $_POST['consultation_fee'];
$lab_charges = $_POST['lab_charges'];
$medicine_charges = $_POST['medicine_charges'];
$other_charges = $_POST['other_charges'];

$total_amount = $_POST['total_amount'];

$payment_status = $_POST['payment_status'];
$bill_date = $_POST['bill_date'];

$sql = "INSERT INTO bills
(patient_name,
doctor_name,
consultation_fee,
lab_charges,
medicine_charges,
other_charges,
total_amount,
payment_status,
bill_date)

VALUES

('$patient_name',
'$doctor_name',
'$consultation_fee',
'$lab_charges',
'$medicine_charges',
'$other_charges',
'$total_amount',
'$payment_status',
'$bill_date')";

if(mysqli_query($conn,$sql)){

    header("Location: billing.php");
    exit();

}else{

    echo "Database Error : ".mysqli_error($conn);

}

?>