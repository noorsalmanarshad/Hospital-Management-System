<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_POST['id'];

$patient_name = $_POST['patient_name'];
$doctor_name = $_POST['doctor_name'];

$consultation_fee = $_POST['consultation_fee'];
$lab_charges = $_POST['lab_charges'];
$medicine_charges = $_POST['medicine_charges'];
$other_charges = $_POST['other_charges'];

$total_amount = $_POST['total_amount'];

$payment_status = $_POST['payment_status'];

$bill_date = $_POST['bill_date'];

$sql = "UPDATE bills SET

patient_name='$patient_name',

doctor_name='$doctor_name',

consultation_fee='$consultation_fee',

lab_charges='$lab_charges',

medicine_charges='$medicine_charges',

other_charges='$other_charges',

total_amount='$total_amount',

payment_status='$payment_status',

bill_date='$bill_date'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    header("Location: billing.php");
    exit();

}else{

    echo "Database Error : ".mysqli_error($conn);

}

?>