<?php

include("../config/database.php");

$id=$_GET['id'];

$sql="SELECT * FROM patients WHERE id='$id'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Patient</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>

<div class="main">

<div class="topbar">

<h2>Edit Patient</h2>

</div>

<div class="form-container">

<form action="update_patient.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="row">

<div class="input-box">

<label>Name</label>

<input type="text"

name="name"

value="<?php echo $row['full_name']; ?>">

</div>

<div class="input-box">

<label>Email</label>

<input type="email"

name="email"

value="<?php echo $row['email']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Phone</label>

<input type="text"

name="phone"

value="<?php echo $row['phone']; ?>">

</div>

<div class="input-box">

<label>Blood Group</label>

<input type="text"

name="blood_group"

value="<?php echo $row['blood_group']; ?>">

</div>

</div>

<div class="input-box">

<label>Address</label>

<textarea name="address"><?php echo $row['address']; ?></textarea>

</div>

<button class="save-btn">

Update Patient

</button>

</form>

</div>

</div>

</body>

</html>