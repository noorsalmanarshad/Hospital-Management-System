<?php
include("../config/database.php");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Add Medicine</title>

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
<i class="fa-solid fa-pills"></i>
<a href="pharmacy.php">Pharmacy</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Add Medicine</h2>

</div>

<div class="form-container">

<form action="save_medicine.php" method="POST">

<div class="row">

<div class="input-box">

<label>Medicine Name</label>

<input type="text" name="medicine_name" placeholder="Enter medicine name" required>

</div>

<div class="input-box">

<label>Category</label>

<select name="category" required>

<option value="" disabled selected>
-- Select Category --
</option>

<option>Tablet</option>

<option>Capsule</option>

<option>Syrup</option>

<option>Injection</option>

<option>Cream</option>

</select>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Company</label>

<input type="text" name="company" placeholder="Enter company name" required>

</div>

<div class="input-box">

<label>Price (Rs)</label>

<input type="number" step="0.01" name="price" placeholder="Enter price" required>

</div>

</div>

<div class="row">

<div class="input-box">

<label>Stock</label>

<input type="number" name="stock" placeholder="Enter stock" required>

</div>

<div class="input-box">

<label>Manufacture Date</label>

<input type="date" name="manufacture_date" placeholder="00-00-0000" required>

</div>

<div class="input-box">

<label>Expiry Date</label>

<input type="date" name="expiry_date" placeholder="00-00-0000" required>

</div>

</div>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Save Medicine

</button>

</form>

</div>

</div>

</body>

</html>