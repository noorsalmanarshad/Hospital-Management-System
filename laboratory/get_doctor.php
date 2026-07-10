<?php

include("../config/database.php");

$patient = $_GET['patient'];

$sql = "SELECT doctor_name
        FROM appointments
        WHERE patient_name='$patient'
        LIMIT 1";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

echo $row['doctor_name'];

?>