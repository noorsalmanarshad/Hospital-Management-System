<?php

session_start();

include("../config/database.php");

$staff_name = mysqli_real_escape_string($conn,$_POST['staff_name']);

$email = mysqli_real_escape_string($conn,$_POST['email']);

$subject = mysqli_real_escape_string($conn,$_POST['subject']);

$message = mysqli_real_escape_string($conn,$_POST['message']);

$rating = $_POST['rating'];

$sql="INSERT INTO feedback
(user_type,staff_id,staff_name,email,subject,message,rating)

VALUES

('Patient',
NULL,
'$staff_name',
'$email',
'$subject',
'$message',
'$rating')";

if(mysqli_query($conn,$sql)){

echo "<script>

alert('Feedback Submitted Successfully');

window.location='feedback.php';

</script>";

}else{

echo mysqli_error($conn);

}

?>