<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

if(!isset($_GET['id'])){
    header("Location: inventory.php");
    exit();
}

$id=$_GET['id'];

$sql="SELECT * FROM medicines WHERE id='$id'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Medicine Not Found");
}

$row=mysqli_fetch_assoc($result);

/*==========================
Medicine Status
===========================*/

if(strtotime($row['expiry_date'])<time()){

$status="Expired";
$class="delete";

}

elseif($row['stock']==0){

$status="Out Of Stock";
$class="delete";

}

elseif($row['stock']<=20){

$status="Low Stock";
$class="pending";

}

else{

$status="In Stock";
$class="active";

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>View Medicine</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>

<i class="fa-solid fa-house"></i>

<a href="../admin/dashboard.php">Dashboard</a>

</li>

<li class="active">

<i class="fa-solid fa-boxes-stacked"></i>

<a href="inventory.php">Inventory</a>

</li>

<li>

<i class="fa-solid fa-right-from-bracket"></i>

<a href="../auth/logout.php">Logout</a>

</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Medicine Details</h2>

</div>

<div class="profile-card">

<h2>

<i class="fa-solid fa-capsules"></i>

<?php echo $row['medicine_name']; ?>

</h2>

<hr><br>

<table class="profile-table">

<tr>

<td><b>Medicine Name</b></td>

<td><?php echo $row['medicine_name']; ?></td>

</tr>

<tr>

<td><b>Category</b></td>

<td><?php echo $row['category']; ?></td>

</tr>

<tr>

<td><b>Company</b></td>

<td><?php echo $row['company']; ?></td>

</tr>

<tr>

<td><b>Quantity Available</b></td>

<td><?php echo $row['stock']; ?></td>

</tr>

<tr>

<td><b>Unit Price</b></td>

<td>Rs. <?php echo number_format($row['price'],2); ?></td>

</tr>

<tr>

<td><b>Manufacture Date</b></td>

<td><?php echo date("d M Y",strtotime($row['manufacture_date'])); ?></td>

</tr>

<tr>

<td><b>Expiry Date</b></td>

<td><?php echo date("d M Y",strtotime($row['expiry_date'])); ?></td>

</tr>

<tr>

<td><b>Status</b></td>

<td>

<span class="<?php echo $class; ?>">

<?php echo $status; ?>

</span>

</td>

</tr>

</table>

<br>

<a href="inventory.php" class="save-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

</div>

</body>

</html>