<?php

session_start();

include("../config/database.php");

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$role = $_POST['role'];


/* =========================
   DOCTOR LOGIN
========================= */

if($role=="Doctor"){

    $sql="SELECT * FROM doctors
          WHERE email='$email'
          AND password='$password'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $doctor=mysqli_fetch_assoc($result);

        $_SESSION['doctor_id']=$doctor['id'];
        $_SESSION['doctor_name']=$doctor['full_name'];
        $_SESSION['doctor_email']=$doctor['email'];
        $_SESSION['role']="Doctor";

        header("Location: ../doctor/dashboard.php");
        exit();

    }else{

        echo "<script>
        alert('Invalid Doctor Email or Password');
        window.location='login.php';
        </script>";

    }

}

/* =========================
   STAFF LOGIN
========================= */

elseif($role=="Staff"){

    $sql="SELECT * FROM staff
          WHERE email='$email'
          AND password='$password'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $staff=mysqli_fetch_assoc($result);

        $_SESSION['staff_id']=$staff['id'];
        $_SESSION['staff_name']=$staff['full_name'];
        $_SESSION['staff_email']=$staff['email'];
        $_SESSION['role']="Staff";

        header("Location: ../staff/dashboard.php");
        exit();

    }else{

        echo "<script>
        alert('Invalid Staff Email or Password');
        window.location='login.php';
        </script>";

    }

}

/* =========================
   PATIENT LOGIN
========================= */

elseif($role=="Patient"){

    $sql="SELECT * FROM patients
          WHERE email='$email'
          AND password='$password'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $patient=mysqli_fetch_assoc($result);

        $_SESSION['patient_id']=$patient['id'];
        $_SESSION['patient_name']=$patient['full_name'];
        $_SESSION['patient_email']=$patient['email'];
        $_SESSION['role']="Patient";

        header("Location: ../patient/dashboard.php");
        exit();

    }else{

        echo "<script>

        alert('Invalid Patient Email or Password');

        window.location='login.php';

        </script>";

    }

}


/* =========================
   OTHER USERS LOGIN
========================= */

else{

    $sql="SELECT * FROM users
          WHERE email='$email'
          AND password='$password'
          AND role='$role'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        $user=mysqli_fetch_assoc($result);

        $_SESSION['id']=$user['id'];
        $_SESSION['user']=$user['name'];
        $_SESSION['email']=$user['email'];
        $_SESSION['role']=$user['role'];

        if($user['role']=="Admin"){

            header("Location: ../admin/dashboard.php");
            exit();

        }

        elseif($user['role']=="Receptionist"){

            header("Location: ../receptionist/dashboard.php");
            exit();

        }

        elseif($user['role']=="Pharmacist"){

            header("Location: ../pharmacist/dashboard.php");
            exit();

        }

        elseif($user['role']=="Billing"){

            header("Location: ../billing/dashboard.php");
            exit();

        }

    }else{

        echo "<script>
        alert('Invalid Email or Password');
        window.location='login.php';
        </script>";

    }

}

?>