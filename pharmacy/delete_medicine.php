<?php

include("../config/database.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM medicines WHERE id='$id'");

header("Location: pharmacy.php");

?>