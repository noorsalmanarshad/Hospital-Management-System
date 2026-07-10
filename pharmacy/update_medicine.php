<?php

include("../config/database.php");

$id=$_POST['id'];

$name=$_POST['medicine_name'];

$category=$_POST['category'];

$company=$_POST['company'];

$price=$_POST['price'];

$stock=$_POST['stock'];

$expiry=$_POST['expiry_date'];

$sql="UPDATE medicines SET

medicine_name='$name',

category='$category',

company='$company',

price='$price',

stock='$stock',

expiry_date='$expiry'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: pharmacy.php");

}else{

echo mysqli_error($conn);

}

?>