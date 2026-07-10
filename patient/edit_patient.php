<?php

session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Edit Patient</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>Subhan Care</h2>

<ul>

<li>
    <i class="fa-solid fa-house"></i>
    <a href="../admin/dashboard.php">Dashboard</a>
</li>

<li class="active">
    <i class="fa-solid fa-bed"></i>
    <a href="patients.php">Patients</a>
</li>

<li>
    <i class="fa-solid fa-right-from-bracket"></i>
    <a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<!-- MAIN -->

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
value="<?php echo $row['full_name']; ?>" required>

</div>

<div class="input-box">

<label>Email</label>

<input type="email"
name="email"
value="<?php echo $row['email']; ?>" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Phone</label>

<input type="text"
name="phone"
value="<?php echo $row['phone']; ?>" required>

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

<i class="fa-solid fa-floppy-disk"></i>

Update Patient

</button>

</form>

</div>

</div>

</body>

</html>