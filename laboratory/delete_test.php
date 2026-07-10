<?php

include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM laboratory_tests WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: laboratory.php");

}else{

echo mysqli_error($conn);

}

?>