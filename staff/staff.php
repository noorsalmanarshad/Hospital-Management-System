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

<title>Staff Management</title>

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
<i class="fa-solid fa-users"></i>
<a href="staff.php">Staff</a>
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

<h2>Staff Management</h2>

<a href="add_staff.php" class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Staff

</a>

</div>

<div class="table-box">

<table>

<thead>

<tr>

<th>ID</th>

<th>Photo</th>

<th>Name</th>

<th>Role</th>

<th>Shift</th>

<th>Status</th>

<th>Contact</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM staff ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php

if($row['photo']!=""){

?>

<img src="../../assets/uploads/staff/<?php echo $row['photo']; ?>"

width="60"

height="60"

style="border-radius:50%;object-fit:cover;">

<?php

}else{

echo "<b>No Photo</b>";

}

?>

</td>

<td>

<?php echo $row['full_name']; ?>

</td>

<td>

<?php echo $row['role']; ?>

</td>

<td>

<?php echo $row['shift']; ?>

</td>

<td>

<span class="<?php echo ($row['duty_status']=="On Duty") ? "active":"pending"; ?>">

<?php echo $row['duty_status']; ?>

</span>

</td>

<td>

<?php echo $row['contact']; ?>

</td>

<td class="action-buttons">

<a href="view_staff.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

<a href="edit_staff.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="delete_staff.php?id=<?php echo $row['id']; ?>"

onclick="return confirm('Delete this Staff?')">

<i class="fa-solid fa-trash delete"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="8" style="text-align:center;padding:20px;">

No Staff Found

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