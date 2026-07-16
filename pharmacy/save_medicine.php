<?php

include("../config/database.php");

$name = $_POST['medicine_name'];
$category = $_POST['category'];
$company = $_POST['company'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$manufacture = $_POST['manufacture_date'];
$expiry = $_POST['expiry_date'];

$sql = "INSERT INTO medicines
(
medicine_name,
category,
company,
price,
stock,
manufacture_date,
expiry_date
)

VALUES
(
'$name',
'$category',
'$company',
'$price',
'$stock',
'$manufacture',
'$expiry'
)";

if(mysqli_query($conn,$sql)){

header("Location: pharmacy.php");
exit();

}else{

echo mysqli_error($conn);

}

?>