<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

/*==============================
Dashboard Counts
==============================*/

$total=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines"));

$sql = "SELECT * FROM medicines WHERE stock > 20";

$result = mysqli_query($conn,$sql);

if(!$result){
    die(mysqli_error($conn));
}

$available = mysqli_num_rows($result);

$low=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines
WHERE stock>0 AND stock<=20"));

$expired=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines
WHERE expiry_date<CURDATE()"));

/*==============================
Inventory Alerts
==============================*/

$outStock=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines
WHERE stock=0"));

$lowStock=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines
WHERE stock>0
AND stock<=20"));

$expiring=mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM medicines
WHERE expiry_date
BETWEEN CURDATE() AND DATE_ADD(CURDATE(),INTERVAL 30 DAY)"));

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Inventory Management</title>

<link rel="stylesheet"
href="../assets/css/dashboard.css">

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

<h2>

Inventory Management

</h2>

</div>

<!-- Cards -->

<div class="cards">

<div class="card">

<i class="fa-solid fa-box"></i>

<h3>Total Medicines</h3>

<p>

<?php echo $total; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-circle-check"></i>

<h3>Available</h3>

<p>

<?php echo $available; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-triangle-exclamation"></i>

<h3>Low Stock</h3>

<p>

<?php echo $low; ?>

</p>

</div>

<div class="card">

<i class="fa-solid fa-calendar-xmark"></i>

<h3>Expired</h3>

<p>

<?php echo $expired; ?>

</p>

</div>

</div>

<br>

<div class="alert-box">

<h3>

<i class="fa-solid fa-triangle-exclamation"></i>

Inventory Alerts

</h3>

<?php

if($outStock==0 && $lowStock==0 && $expiring==0){

?>

<div class="alert success">

<i class="fa-solid fa-circle-check"></i>

No Inventory Alerts

</div>

<?php

}else{

if($outStock>0){

?>

<div class="alert danger">

🔴

<?php echo $outStock; ?>

Medicine(s) are Out Of Stock

</div>

<?php

}

if($lowStock>0){

?>

<div class="alert warning">

🟡

<?php echo $lowStock; ?>

Medicine(s) are Low Stock

</div>

<?php

}

if($expiring>0){

?>

<div class="alert expire">

📅

<?php echo $expiring; ?>

Medicine(s) will expire within 30 days

</div>

<?php

}

}

?>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>

<th>Medicine</th>

<th>Category</th>

<th>Company</th>

<th>Quantity</th>

<th>MFG Date</th>

<th>Expiry Date</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM medicines
ORDER BY medicine_name ASC";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

$status="";

$class="";

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

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php echo $row['medicine_name']; ?>

</td>

<td>

<?php echo $row['category']; ?>

</td>

<td>

<?php echo $row['company']; ?>

</td>

<td>

<?php echo $row['stock']; ?>

</td>

<td>

<?php echo $row['manufacture_date']; ?>

</td>

<td>

<?php echo $row['expiry_date']; ?>

</td>

<td>

<span class="<?php echo $class; ?>">

<?php echo $status; ?>

</span>

</td>

<td>

<a href="view_item.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</body>

</html>