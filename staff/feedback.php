<?php

session_start();

if(!isset($_SESSION['staff_email'])){
header("Location: ../auth/login.php");
exit();
}

include("../config/database.php");

$email=$_SESSION['staff_email'];

$sql="SELECT * FROM staff WHERE email='$email'";

$result=mysqli_query($conn,$sql);

$staff=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Feedback</title>

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
<a href="dashboard.php">Dashboard</a>
</li>

<li class="active">
<i class="fa-solid fa-comment"></i>
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

<h2>Hospital Feedback</h2>

</div>

<div class="form-container">

<form action="save_feedback.php" method="POST">

<div class="row">

<div class="input-box">

<label>Name</label>

<input type="text"

name="staff_name"

value="<?php echo $staff['full_name']; ?>"

readonly>

</div>

<div class="input-box">

<label>Email</label>

<input type="email"

name="email"

value="<?php echo $staff['email']; ?>"

readonly>

</div>

</div>

<div class="input-box">

<label>Subject</label>

<input type="text"

name="subject"

placeholder="Enter Subject"

required>

</div>

<div class="input-box">

<label>Feedback</label>

<textarea

name="message"

rows="8"

placeholder="Write your feedback..."

required>

</textarea>

</div>

<div class="input-box">

<label>Rating</label>

<select name="rating" required>

<option value="">Select Rating</option>

<option value="5">⭐⭐⭐⭐⭐ Excellent</option>

<option value="4">⭐⭐⭐⭐ Good</option>

<option value="3">⭐⭐⭐ Average</option>

<option value="2">⭐⭐ Poor</option>

<option value="1">⭐ Very Poor</option>

</select>

</div>

<button class="save-btn">

<i class="fa-solid fa-paper-plane"></i>

Submit Feedback

</button>

</form>

</div>

</div>

</body>

</html>