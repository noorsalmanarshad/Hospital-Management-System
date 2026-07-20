<?php

include("../config/database.php");

$data=mysqli_fetch_assoc(mysqli_query($conn,
"SELECT theme FROM settings WHERE id=1"));

if($data['theme']=="light"){

    $newTheme="dark";

}else{

    $newTheme="light";

}

mysqli_query($conn,
"UPDATE settings
SET theme='$newTheme'
WHERE id=1");

header("Location: ".$_SERVER['HTTP_REFERER']);

exit();

?>