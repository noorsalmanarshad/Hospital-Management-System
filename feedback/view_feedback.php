<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

if(!isset($_GET['id'])){
    header("Location: feedback.php");
    exit();
}

$id=$_GET['id'];

$sql="SELECT * FROM feedback WHERE id='$id'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    die("Feedback Not Found");
}

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>View Feedback</title>

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

<h2>Feedback Details</h2>

</div>

<div class="profile-card">

<h2>

<?php echo $row['user_type']; ?> Feedback

</h2>

<hr><br>

<table class="profile-table">

<tr>

<td><b>User Type</b></td>

<td><?php echo $row['user_type']; ?></td>

</tr>

<tr>

<td><b>Name</b></td>

<td><?php echo $row['staff_name']; ?></td>

</tr>

<tr>

<td><b>Email</b></td>

<td><?php echo $row['email']; ?></td>

</tr>

<tr>

<td><b>Subject</b></td>

<td><?php echo $row['subject']; ?></td>

</tr>

<tr>

<td><b>Rating</b></td>

<td><?php echo $row['rating']; ?>/5</td>

</tr>

<tr>

<td><b>Message</b></td>

<td><?php echo nl2br($row['message']); ?></td>

</tr>

<tr>

<td><b>Date</b></td>

<td><?php echo $row['date']; ?></td>

</tr>

</table>

<br>

<a href="feedback.php" class="save-btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

</div>

</body>

</html>