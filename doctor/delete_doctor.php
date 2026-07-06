<?php

include("../config/database.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Pehle photo ka naam lo
    $sql = "SELECT photo FROM doctors WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);

        if(!empty($row['photo'])){

            $path = "../assets/uploads/doctors/".$row['photo'];

            if(file_exists($path)){
                unlink($path);
            }

        }

    }

    // Database se doctor delete karo
    $delete = "DELETE FROM doctors WHERE id='$id'";

    if(mysqli_query($conn,$delete)){

        header("Location: doctors.php");
        exit();

    }else{

        echo "Error: ".mysqli_error($conn);

    }

}else{

    header("Location: doctors.php");
    exit();

}

?>