-<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "DELETE FROM bills WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    header("Location: billing.php");
    exit();

}else{

    echo "Database Error : ".mysqli_error($conn);

}

?>