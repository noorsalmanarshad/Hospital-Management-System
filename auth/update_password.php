<?php

include("../config/database.php");

$email = trim($_POST['email']);

$password = trim($_POST['password']);

$confirm = trim($_POST['confirm_password']);

if($password != $confirm){

die("Passwords do not match!");

}

// Password hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Update password
$update = mysqli_query($conn,"
UPDATE users
SET password='$hashedPassword'
WHERE email='$email'
");

if($update){

// Delete OTP after successful reset
mysqli_query($conn,"
DELETE FROM password_otp
WHERE email='$email'
");

// Redirect to login page
header("Location: login.php?success=1");
exit();

}
else{

echo "Password update failed.";

}

?>