<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_POST['id'];

$allergy = mysqli_real_escape_string($conn,$_POST['allergy']);
$allergy_details = mysqli_real_escape_string($conn,$_POST['allergy_details']);

$infection = mysqli_real_escape_string($conn,$_POST['infection']);
$infection_details = mysqli_real_escape_string($conn,$_POST['infection_details']);

$chronic_disease = mysqli_real_escape_string($conn,$_POST['chronic_disease']);

$current_medicines = mysqli_real_escape_string($conn,$_POST['current_medicines']);

$previous_surgeries = mysqli_real_escape_string($conn,$_POST['previous_surgeries']);

$emergency_contact_name = mysqli_real_escape_string($conn,$_POST['emergency_contact_name']);

$emergency_contact_phone = mysqli_real_escape_string($conn,$_POST['emergency_contact_phone']);

$medical_notes = mysqli_real_escape_string($conn,$_POST['medical_notes']);

$sql = "UPDATE patients SET

allergy='$allergy',

allergy_details='$allergy_details',

infection='$infection',

infection_details='$infection_details',

chronic_disease='$chronic_disease',

current_medicines='$current_medicines',

previous_surgeries='$previous_surgeries',

emergency_contact_name='$emergency_contact_name',

emergency_contact_phone='$emergency_contact_phone',

medical_notes='$medical_notes'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

echo "<script>

alert('Medical History Updated Successfully');

window.location='medical_history.php';

</script>";

}else{

echo mysqli_error($conn);

}

?>