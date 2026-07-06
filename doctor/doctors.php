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

<title>Doctors</title>

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
<i class="fa-solid fa-user-doctor"></i>
<a href="doctors.php">Doctors</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Doctors</h2>

<a href="add_doctor.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Doctor

</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Department</th>
<th>Email</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM doctors ORDER BY id DESC";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img src="../assets/uploads/doctors/<?php echo $row['photo']; ?>"

width="50"

height="50"

style="border-radius:50%; object-fit:cover;">

</td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>

<span class="active">

Available

</span>

</td>

<td>

<a href="edit_doctor.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_doctor.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this doctor?')">

<i class="fa-solid fa-trash delete"></i>

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