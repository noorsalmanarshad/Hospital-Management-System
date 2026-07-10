<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Patients</title>

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

<h2>Patients</h2>

<a href="add_patient.php" class="add-btn">
<i class="fa-solid fa-plus"></i> Add Patient
</a>

</div>

<div class="table-box">

<table>

<thead>
<tr>
<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Blood Group</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
$sql = "SELECT * FROM patients ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="../assets/uploads/patients/<?php echo $row['photo']; ?>"
width="50" height="50"
style="border-radius:50%; object-fit:cover;">
</td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td>
<?php echo isset($row['blood_group']) ? $row['blood_group'] : ''; ?>
</td>

<td class="action-buttons">

<!-- Patient Report -->

<a href="../reports/patient_report.php?id=<?php echo $row['id']; ?>"
title="Patient Report">

<i class="fa-solid fa-file-medical report"></i>

</a>

<!-- Edit -->

<a href="edit_patient.php?id=<?php echo $row['id']; ?>"
title="Edit">

<i class="fa-solid fa-pen edit"></i>

</a>

<!-- Delete -->

<a href="delete_patient.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this patient?')"
title="Delete">

<i class="fa-solid fa-trash delete"></i>

</a>

</td>

</tr>

<?php
}

}else{
?>

<tr>
<td colspan="8" style="text-align:center; padding:20px;">
No Patients Found
</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>