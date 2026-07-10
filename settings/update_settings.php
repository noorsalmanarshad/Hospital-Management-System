<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_POST['id'];

$hospital_name = $_POST['hospital_name'];
$hospital_email = $_POST['hospital_email'];
$hospital_phone = $_POST['hospital_phone'];
$hospital_address = $_POST['hospital_address'];

/* Get Old Logo */

$get = mysqli_query($conn,"SELECT logo FROM settings WHERE id='$id'");
$old = mysqli_fetch_assoc($get);

$logo = $old['logo'];

/* Upload New Logo */

if(isset($_FILES['logo']) && $_FILES['logo']['name']!=""){

    $logo = time()."_".$_FILES['logo']['name'];

    move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        "../assets/uploads/settings/".$logo
    );

}

/* Update Settings */

$sql = "UPDATE settings SET

hospital_name='$hospital_name',

hospital_email='$hospital_email',

hospital_phone='$hospital_phone',

hospital_address='$hospital_address',

logo='$logo'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    echo "<script>

    alert('Settings Updated Successfully');

    window.location='settings.php';

    </script>";

}else{

    echo mysqli_error($conn);

}

?>