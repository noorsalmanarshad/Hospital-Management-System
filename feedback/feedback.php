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

<title>Staff Feedback</title>

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
<i class="fa-solid fa-comments"></i>
<a href="feedback.php">Feedback</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Staff Feedback</h2>

</div>

<div class="table-box">

<table>

<thead>

<tr>
    <th>ID</th>
    <th>User Type</th>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Date</th>
    <th>Action</th>
</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM feedback ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['user_type']; ?></td>

<td><?php echo $row['staff_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['date']; ?></td>

<td>

<a href="view_feedback.php?id=<?php echo $row['id']; ?>">

<i class="fa-solid fa-eye report"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="6" style="text-align:center;padding:20px;">

No Feedback Found

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