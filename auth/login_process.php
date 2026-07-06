<?php

session_start();

include("../config/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='$role'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    if($user['role']=="Admin"){

    header("Location: ../admin/dashboard.php");

}
elseif($user['role']=="Doctor"){

    header("Location: ../doctor/dashboard.php");

}
elseif($user['role']=="Receptionist"){

    header("Location: ../receptionist/dashboard.php");

}
elseif($user['role']=="Pharmacist"){

    header("Location: ../pharmacist/dashboard.php");

}
elseif($user['role']=="Billing"){

    header("Location: ../billing/dashboard.php");

}

}
else{

    echo "<script>

    alert('Invalid Email or Password');

    window.location='login.php';

    </script>";

}
$role = $_POST['role'];
?>