<?php

include("../config/database.php");

$email = trim($_POST['email']);
$otp = trim($_POST['otp']);

$query = mysqli_query($conn,"
SELECT *
FROM password_otp
WHERE email='$email'
AND otp='$otp'
AND created_at >= (NOW() - INTERVAL 5 MINUTE)
");

if(mysqli_num_rows($query) > 0){

    header("Location:new_password.php?email=".$email);
    exit();

}else{

    echo "Invalid or Expired OTP!";

}

?>