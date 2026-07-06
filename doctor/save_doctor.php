<?php

include("../config/database.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];

/* ==========================
   CHECK DUPLICATE EMAIL
========================== */

$check = "SELECT * FROM doctors WHERE email='$email'";
$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0){

    die("❌ This email is already registered. Please use another email.");

}

/* ==========================
   IMAGE UPLOAD
========================== */

$image = "";

if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){

    $image = time()."_".$_FILES['photo']['name'];

    $temp = $_FILES['photo']['tmp_name'];

    $folder = "../assets/uploads/doctors/";

    // Folder agar exist nahi karta to bana do
    if(!file_exists($folder)){

        mkdir($folder,0777,true);

    }

    move_uploaded_file($temp,$folder.$image);

}

/* ==========================
   INSERT DATA
========================== */

$sql = "INSERT INTO doctors
(full_name,email,password,phone,department,gender,dob,address,photo)

VALUES

('$name',
'$email',
'$password',
'$phone',
'$department',
'$gender',
'$dob',
'$address',
'$image')";

if(mysqli_query($conn,$sql)){

    header("Location: doctors.php");
    exit();

}
else{

    echo "Database Error : ".mysqli_error($conn);

}

?>

