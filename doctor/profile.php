<?php

session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!="Doctor"){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

if(!isset($_SESSION['email'])){
    die("Doctor session not found.");
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM doctors WHERE email='$email' LIMIT 1";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);

}else{

    die("Doctor profile not found. Please ask Admin to add this doctor.");
}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>My Profile</title>

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
<i class="fa-solid fa-user"></i>
<a href="profile.php">My Profile</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-bed"></i>
<a href="patients.php">Patients</a>
</li>

<li>
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-file-prescription"></i>
<a href="prescriptions.php">Prescriptions</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>My Profile</h2>

</div>

<div class="form-container">

<form action="update_profile.php" method="POST" enctype="multipart/form-data">

<div style="text-align:center;margin-bottom:30px;">

<img src="../assets/uploads/doctors/<?php echo $row['photo'];?>"

width="120"

height="120"

style="border-radius:50%;object-fit:cover;border:3px solid #2563EB;">

<br><br>

<input type="file" name="photo">

</div>

<input type="hidden" name="id"
value="<?php echo $row['id']; ?>">

<div class="row">

<div class="input-box">

<label>Full Name</label>

<input type="text"

name="full_name"

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

<label>Department</label>

<input type="text"

name="department"

value="<?php echo $row['department']; ?>">

</div>

</div>

<div class="input-box">

<label>Address</label>

<textarea

name="address"><?php echo $row['address']; ?></textarea>

</div>

<button class="save-btn">

Update Profile

</button>

</form>

</div>

</div>

</body>

</html>