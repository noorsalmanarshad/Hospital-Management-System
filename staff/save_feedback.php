<?php

session_start();

if(!isset($_SESSION['staff_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$staff_name = mysqli_real_escape_string($conn,$_POST['staff_name']);

$email = mysqli_real_escape_string($conn,$_POST['email']);

$subject = mysqli_real_escape_string($conn,$_POST['subject']);

$message = mysqli_real_escape_string($conn,$_POST['message']);

$sql="INSERT INTO feedback
(user_type,staff_id,staff_name,email,subject,message,rating)

VALUES

('Staff',
'$staff_id',
'$staff_name',
'$email',
'$subject',
'$message',
'$rating')";

if(mysqli_query($conn,$sql)){

echo "<script>

alert('Feedback Submitted Successfully!');

window.location='feedback.php';

</script>";

}else{

echo mysqli_error($conn);

}

?>