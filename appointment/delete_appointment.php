<?php

include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id='$id'";

if(mysqli_query($conn,$sql)){
    header("Location: appointments.php");
}else{
    echo mysqli_error($conn);
}

?>