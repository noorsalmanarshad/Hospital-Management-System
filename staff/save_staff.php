<?php

include("../config/database.php");

// Form Data
$full_name      = $_POST['full_name'];
$email          = $_POST['email'];
$password       = $_POST['password'];
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

// Check Duplicate Email
$check = mysqli_query($conn,"SELECT * FROM staff WHERE email='$email'");

if(mysqli_num_rows($check)>0){

    echo "<script>
    alert('Email already exists!');
    window.location='add_staff.php';
    </script>";

    exit();
}

// Upload Photo
$photo = "";

if($_FILES['photo']['name']!=""){

    $photo = time()."_".$_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "../../assets/uploads/staff/".$photo
    );
}

// Insert Query

$sql = "INSERT INTO staff
(
full_name,
email,
password,
contact,
cnic,
gender,
dob,
address,
role,
shift,
duty_status,
salary,
working_hours,
work_duration,
previous_job,
join_date,
photo
)

VALUES
(
'$full_name',
'$email',
'$password',
'$contact',
'$cnic',
'$gender',
'$dob',
'$address',
'$role',
'$shift',
'$duty_status',
'$salary',
'$working_hours',
'$work_duration',
'$previous_job',
'$join_date',
'$photo'
)";

if(mysqli_query($conn,$sql)){

    header("Location: staff.php");

}else{

    echo mysqli_error($conn);

}

?>