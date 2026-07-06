<?php

include("../config/database.php");

$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$blood_group=$_POST['blood_group'];

$address=$_POST['address'];

$sql="UPDATE patients SET

full_name='$name',

email='$email',

phone='$phone',

blood_group='$blood_group',

address='$address'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: patients.php");

exit();

}else{

echo mysqli_error($conn);

}

?>