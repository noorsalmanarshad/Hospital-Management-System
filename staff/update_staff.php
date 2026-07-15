<?php

include("../../config/database.php");

$id             = $_POST['id'];
$full_name      = $_POST['full_name'];
$email          = $_POST['email'];
$contact        = $_POST['contact'];
$cnic           = $_POST['cnic'];
$gender         = $_POST['gender'];
$dob            = $_POST['dob'];
$address        = $_POST['address'];

$role           = $_POST['role'];
$shift          = $_POST['shift'];
$duty_status    = $_POST['duty_status'];
$salary         = $_POST['salary'];
$working_hours  = $_POST['working_hours'];
$work_duration  = $_POST['work_duration'];
$previous_job   = $_POST['previous_job'];
$join_date      = $_POST['join_date'];

/* Current Photo */

$data = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM staff WHERE id='$id'")
);

$photo = $data['photo'];

/* Upload New Photo */

if($_FILES['photo']['name']!=""){

    $photo = time()."_".$_FILES['photo']['name'];

    move_uploaded_file(

        $_FILES['photo']['tmp_name'],

        "../../assets/uploads/staff/".$photo

    );

}

/* Update */

$sql="UPDATE staff SET

full_name='$full_name',

email='$email',

contact='$contact',

cnic='$cnic',

gender='$gender',

dob='$dob',

address='$address',

role='$role',

shift='$shift',

duty_status='$duty_status',

salary='$salary',

working_hours='$working_hours',

work_duration='$work_duration',

previous_job='$previous_job',

join_date='$join_date',

photo='$photo'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    header("Location: staff.php");

}else{

    echo mysqli_error($conn);

}

?>