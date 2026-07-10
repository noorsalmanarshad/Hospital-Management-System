<?php

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM laboratory_tests WHERE id='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Edit Test</title>

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

<h2>Edit Laboratory Test</h2>

</div>

<div class="form-container">

<form action="update_test.php" method="POST">

<input type="hidden" name="id"
value="<?php echo $row['id']; ?>">

<!-- Row 1 -->

<div class="row">

<div class="input-box">

<label>Patient Name</label>

<input type="text"
name="patient_name"
value="<?php echo $row['patient_name']; ?>">

</div>

<div class="input-box">

<label>Test Name</label>

<select name="test_name">

<option <?php if($row['test_name']=="CBC Test") echo "selected"; ?>>CBC Test</option>

<option <?php if($row['test_name']=="Blood Sugar") echo "selected"; ?>>Blood Sugar</option>

<option <?php if($row['test_name']=="Urine Test") echo "selected"; ?>>Urine Test</option>

<option <?php if($row['test_name']=="X-Ray") echo "selected"; ?>>X-Ray</option>

<option <?php if($row['test_name']=="MRI") echo "selected"; ?>>MRI</option>

<option <?php if($row['test_name']=="CT Scan") echo "selected"; ?>>CT Scan</option>

</select>

</div>

</div>

<!-- Row 2 -->

<div class="row">

<div class="input-box">

<label>Doctor Name</label>

<input type="text"
name="doctor_name"
value="<?php echo $row['doctor_name']; ?>">

</div>

<div class="input-box">

<label>Test Date</label>

<input type="date"
name="test_date"
value="<?php echo $row['test_date']; ?>">

</div>

</div>

<!-- Row 3 -->

<div class="row">

<div class="input-box">

<label>Result</label>

<select name="result">

<option value="Pending"
<?php if($row['result']=="Pending") echo "selected"; ?>>
Pending
</option>

<option value="Completed"
<?php if($row['result']=="Completed") echo "selected"; ?>>
Completed
</option>

</select>

</div>

<div class="input-box">

<label>Blood Group</label>

<select name="blood_group">

<option value="A+" <?php if($row['blood_group']=="A+") echo "selected"; ?>>A+</option>

<option value="A-" <?php if($row['blood_group']=="A-") echo "selected"; ?>>A-</option>

<option value="B+" <?php if($row['blood_group']=="B+") echo "selected"; ?>>B+</option>

<option value="B-" <?php if($row['blood_group']=="B-") echo "selected"; ?>>B-</option>

<option value="AB+" <?php if($row['blood_group']=="AB+") echo "selected"; ?>>AB+</option>

<option value="AB-" <?php if($row['blood_group']=="AB-") echo "selected"; ?>>AB-</option>

<option value="O+" <?php if($row['blood_group']=="O+") echo "selected"; ?>>O+</option>

<option value="O-" <?php if($row['blood_group']=="O-") echo "selected"; ?>>O-</option>

</select>

</div>

</div>

<!-- Row 4 -->

<div class="row">

<div class="input-box">

<label>Hemoglobin (Hb)</label>

<input type="text"
name="hemoglobin"
value="<?php echo $row['hemoglobin']; ?>">

</div>

<div class="input-box">

<label>Blood Sugar</label>

<input type="text"
name="sugar_level"
value="<?php echo $row['sugar_level']; ?>">

</div>

</div>

<!-- Row 5 -->

<div class="row">

<div class="input-box">

<label>Blood Pressure</label>

<input type="text"
name="blood_pressure"
value="<?php echo $row['blood_pressure']; ?>">

</div>

<div class="input-box">

<label>&nbsp;</label>

</div>

</div>

<div class="input-box">

<label>Remarks</label>

<textarea name="remarks"><?php echo $row['remarks']; ?></textarea>

</div>

<button class="save-btn">

Update Test

</button>

</form>

</div>

</div>

</body>

</html>