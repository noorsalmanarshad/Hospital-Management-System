<?php

include("../config/database.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];

$check = "SELECT * FROM patients WHERE email='$email'";
$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result)>0){

    die("Email already exists.");

}

$image="";

if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){

    $image=time()."_".$_FILES['photo']['name'];

    $temp=$_FILES['photo']['tmp_name'];

    $folder="../assets/uploads/patients/";

    if(!file_exists($folder)){

        mkdir($folder,0777,true);

    }

    move_uploaded_file($temp,$folder.$image);

}

$sql="INSERT INTO patients
(full_name,email,password,phone,gender,dob,blood_group,address,photo)

VALUES

('$name',
'$email',
'$password',
'$phone',
'$gender',
'$dob',
'$blood_group',
'$address',
'$image')";

if(mysqli_query($conn,$sql)){

    header("Location: patients.php");
    exit();

}else{

    echo mysqli_error($conn);

}

mysqli_query($conn,"
INSERT INTO notifications(message)
VALUES('New Patient Registered')
");

?>