<?php

include("../../config/database.php");

$id = $_GET['id'];

/* Get Photo */

$data = mysqli_fetch_assoc(

mysqli_query($conn,"SELECT * FROM staff WHERE id='$id'")

);

/* Delete Photo */

if($data['photo']!=""){

unlink("../../assets/uploads/staff/".$data['photo']);

}

/* Delete Record */

mysqli_query($conn,"DELETE FROM staff WHERE id='$id'");

header("Location: staff.php");

?>