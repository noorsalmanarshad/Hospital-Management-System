<?php

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM staff WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Staff</title>

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
<i class="fa-solid fa-users"></i>
<a href="staff.php">Staff</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Edit Staff</h2>

</div>

<div class="form-container">

<form action="update_staff.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="row">

<div class="input-box">

<label>Full Name</label>

<input type="text" name="full_name"
value="<?php echo $row['full_name']; ?>">

</div>

<div class="input-box">

<label>Email</label>

<input type="email" name="email"
value="<?php echo $row['email']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Contact Number</label>

<input type="text" name="contact"
value="<?php echo $row['contact']; ?>">

</div>

<div class="input-box">

<label>CNIC</label>

<input type="text" name="cnic"
value="<?php echo $row['cnic']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Gender</label>

<select name="gender">

<option <?php if($row['gender']=="Male") echo "selected"; ?>>Male</option>

<option <?php if($row['gender']=="Female") echo "selected"; ?>>Female</option>

</select>

</div>

<div class="input-box">

<label>Date of Birth</label>

<input type="date"
name="dob"
value="<?php echo $row['dob']; ?>">

</div>

</div>

<div class="input-box">

<label>Address</label>

<input type="text"
name="address"
value="<?php echo $row['address']; ?>">

</div>

<div class="row">

<div class="input-box">

<label>Role</label>

<select name="role">

<option <?php if($row['role']=="Receptionist") echo "selected"; ?>>Receptionist</option>

<option <?php if($row['role']=="Billing Officer") echo "selected"; ?>>Billing Officer</option>

<option <?php if($row['role']=="Cashier") echo "selected"; ?>>Cashier</option>

<option <?php if($row['role']=="Lab Technician") echo "selected"; ?>>Lab Technician</option>

<option <?php if($row['role']=="Pharmacist") echo "selected"; ?>>Pharmacist</option>

<option <?php if($row['role']=="Ward Assistant") echo "selected"; ?>>Ward Assistant</option>

</select>

</div>

<div class="input-box">

<label>Shift</label>

<select name="shift">

<option <?php if($row['shift']=="Morning") echo "selected"; ?>>Morning</option>

<option <?php if($row['shift']=="Evening") echo "selected"; ?>>Evening</option>

<option <?php if($row['shift']=="Night") echo "selected"; ?>>Night</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Duty Status</label>

<select name="duty_status">

<option <?php if($row['duty_status']=="On Duty") echo "selected"; ?>>On Duty</option>

<option <?php if($row['duty_status']=="On Leave") echo "selected"; ?>>On Leave</option>

</select>

</div>

<div class="input-box">

<label>Salary</label>

<input type="number"
name="salary"
value="<?php echo $row['salary']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Working Hours</label>

<input type="text"
name="working_hours"
value="<?php echo $row['working_hours']; ?>">

</div>

<div class="input-box">

<label>Work Duration</label>

<input type="text"
name="work_duration"
value="<?php echo $row['work_duration']; ?>">

</div>

</div>

<div class="input-box">

<label>Previous Experience</label>

<textarea name="previous_job"><?php echo $row['previous_job']; ?></textarea>

</div>

<div class="row">

<div class="input-box">

<label>Join Date</label>

<input type="date"
name="join_date"
value="<?php echo $row['join_date']; ?>">

</div>

<div class="input-box">

<label>Change Photo</label>

<input type="file" name="photo">

</div>

</div>

<button class="save-btn">

Update Staff

</button>

</form>

</div>

</div>

</body>

</html>