<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['patient_email'];

$patient=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM patients WHERE email='$email'")
);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Patient Feedback</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Patient Panel</h2>

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

<input type="hidden" name="staff_name"
value="<?php echo $patient['full_name']; ?>">

<input type="hidden" name="email"
value="<?php echo $patient['email']; ?>">

<div class="input-box">

<label>Subject</label>

<input type="text"
name="subject"
required>

</div>

<div class="input-box">

<label>Message</label>

<textarea
name="message"
rows="6"
required></textarea>

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

Submit Feedback

</button>

</form>

</div>

</div>

</body>

</html>