<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Billing</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
    <i class="fa-solid fa-house"></i>
    <a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
    <i class="fa-solid fa-file-invoice-dollar"></i>
    <a href="billing.php">Billing</a>
</li>

<li>
    <i class="fa-solid fa-right-from-bracket"></i>
    <a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- Main -->

<div class="main">

<div class="topbar">

<h2>Billing</h2>

<a href="add_bill.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Bill

</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Total Bill</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM bills ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td>Rs. <?php echo $row['total_amount']; ?></td>

<td>

<span class="active">

<?php echo $row['payment_status']; ?>

</span>

</td>

<td><?php echo $row['bill_date']; ?></td>

<td class="action-buttons">

<a href="edit_bill.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_bill.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this bill?')">

<i class="fa-solid fa-trash delete"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="7" style="text-align:center;">

No Bills Found

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>