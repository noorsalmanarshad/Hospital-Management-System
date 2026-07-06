<?php
include("../config/database.php");

$token = $_POST['token'];
$password = $_POST['password'];

// secure password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// find email from token
$query = "SELECT * FROM password_resets WHERE token='$token'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];

    // update password
    $update = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";
    mysqli_query($conn, $update);

    // delete token (one-time use)
    mysqli_query($conn, "DELETE FROM password_resets WHERE token='$token'");

    echo "Password successfully updated!";
}
else {
    echo "Invalid or expired link!";
}
?>