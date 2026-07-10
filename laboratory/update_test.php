<?php

include("../config/database.php");

$id = $_POST['id'];

$patient = $_POST['patient_name'];

$test = $_POST['test_name'];

$date = $_POST['test_date'];

$result = $_POST['result'];

$sql = "UPDATE laboratory_tests SET

patient_name='$patient',

test_name='$test',

test_date='$date',

result='$result'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: laboratory.php");

}else{

echo mysqli_error($conn);

}

?>