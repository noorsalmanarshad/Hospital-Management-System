<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Pharmacy</title>

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
<i class="fa-solid fa-pills"></i>
<a href="pharmacy.php">Pharmacy</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Medicines</h2>

<a href="add_medicine.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Medicine

</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>
<th>Medicine Name</th>
<th>Category</th>
<th>Company</th>
<th>Price</th>
<th>Stock</th>
<th>Expiry Date</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM medicines ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['medicine_name']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['company']; ?></td>

<td>Rs. <?php echo $row['price']; ?></td>

<td><?php echo $row['stock']; ?></td>

<td><?php echo $row['expiry_date']; ?></td>

<td class="action-buttons">

<a href="edit_medicine.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_medicine.php?id=<?php echo $row['id']; ?>"

onclick="return confirm('Delete this medicine?')">

<i class="fa-solid fa-trash delete"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="8" style="text-align:center;">

No Medicines Found

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>