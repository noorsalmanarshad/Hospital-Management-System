<?php

include("../config/database.php");

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM medicines WHERE id='$id'");

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Edit Medicine</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
referrerpolicy="no-referrer" />

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

<h2>Edit Medicine</h2>

</div>

<div class="form-container">

<form action="update_medicine.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="row">

<div class="input-box">

<label>Medicine Name</label>

<input type="text" name="medicine_name"
value="<?php echo $row['medicine_name']; ?>">

</div>

<div class="input-box">

<label>Category</label>

<input type="text" name="category"
value="<?php echo $row['category']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Company</label>

<input type="text" name="company"
value="<?php echo $row['company']; ?>">

</div>

<div class="input-box">

<label>Price</label>

<input type="text" name="price"
value="<?php echo $row['price']; ?>">

</div>

</div>

<div class="row">

<div class="input-box">

<label>Stock</label>

<input type="number" name="stock"
value="<?php echo $row['stock']; ?>">

</div>

<div class="input-box">

<label>Expiry Date</label>

<input type="date" name="expiry_date"
value="<?php echo $row['expiry_date']; ?>">

</div>

</div>

<button class="save-btn">

Update Medicine

</button>

</form>

</div>

</div>

</body>

</html>