<?php

include("../config/database.php");

$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$department=$_POST['department'];

$address=$_POST['address'];

$sql="UPDATE doctors SET

full_name='$name',

email='$email',

phone='$phone',

department='$department',

address='$address'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: doctors.php");

exit();

}else{

echo mysqli_error($conn);

}

?>