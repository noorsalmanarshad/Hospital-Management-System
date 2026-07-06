<?php

include("../config/database.php");

if(isset($_GET['id'])){

    $id=$_GET['id'];

    // Image delete
    $sql="SELECT photo FROM patients WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $row=mysqli_fetch_assoc($result);

        if(!empty($row['photo'])){

            $path="../assets/uploads/patients/".$row['photo'];

            if(file_exists($path)){

                unlink($path);

            }

        }

    }

    // Delete Patient
    $delete="DELETE FROM patients WHERE id='$id'";

    if(mysqli_query($conn,$delete)){

        header("Location: patients.php");
        exit();

    }else{

        echo mysqli_error($conn);

    }

}else{

    header("Location: patients.php");

}

?>