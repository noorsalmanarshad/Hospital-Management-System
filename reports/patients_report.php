<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!="Admin"){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$result=mysqli_query($conn,"
SELECT *
FROM patients
ORDER BY id DESC
");

$total=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Patients Report</title>

<link rel="stylesheet" href="../assets/css/reports.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="main-content">

<div class="page-header">

<div>

<h2>Patients Report</h2>

<p>Subhan Care Hospital Management System</p>

</div>

<div>

<button onclick="window.print()" class="btn print">

<i class="fa-solid fa-print"></i>

Print

</button>

<a href="reports.php" class="btn">

<i class="fa-solid fa-arrow-left"></i>

Back

</a>

</div>

</div>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-bed"></i>

<h3><?php echo $total; ?></h3>

<p>Total Patients</p>

</div>

</div>

<div class="table-box">

<input
type="text"
id="search"
placeholder="Search Patient..."
onkeyup="searchTable()">

<table id="patientTable">

<thead>

<tr>

<th>ID</th>

<th>Name</th>

<th>Gender</th>

<th>Blood Group</th>

<th>Phone</th>

<th>Email</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['blood_group']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<script>

function searchTable(){

let input=document.getElementById("search").value.toUpperCase();

let table=document.getElementById("patientTable");

let tr=table.getElementsByTagName("tr");

for(let i=1;i<tr.length;i++){

let td=tr[i].getElementsByTagName("td")[1];

if(td){

let txt=td.textContent||td.innerText;

tr[i].style.display=
txt.toUpperCase().indexOf(input)>-1?"":"none";

}

}

}

</script>

</body>

</html>