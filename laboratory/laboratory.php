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

<title>Laboratory</title>

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
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Laboratory Tests</h2>

<a href="add_test.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Test

</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>

<th>Patient</th>

<th>Doctor</th>

<th>Test Name</th>

<th>Test Date</th>

<th>Result</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM laboratory_tests ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['test_name']; ?></td>

<td><?php echo $row['test_date']; ?></td>

<td>

<span class="active">

<?php echo $row['result']; ?>

</span>

</td>

<td class="action-buttons">

<a href="edit_test.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_test.php?id=<?php echo $row['id']; ?>"

onclick="return confirm('Delete this Test?')">

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

No Laboratory Tests Found

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>