<?php
include("../config/database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';
require __DIR__ . '/../PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);

    // Check email exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) == 0) {
        die("Email not found!");
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Delete old OTP if exists
    mysqli_query($conn, "DELETE FROM password_otp WHERE email='$email'");

    // Save new OTP
    mysqli_query($conn, "INSERT INTO password_otp(email, otp)
    VALUES('$email','$otp')");

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'noorsalmanarshad@gmail.com';
        $mail->Password = 'lazupcsvdwifluxb';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('noorsalmanarshad@gmail.com', 'Subhan Care');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Password Reset OTP";

        $mail->Body = "
        <h2>Subhan Care Hospital</h2>

        <p>Your Password Reset OTP is:</p>

        <h1>$otp</h1>

        <p>This OTP is valid for 5 minutes.</p>
        ";

        $mail->send();

        header("Location: verify_otp.php?email=".$email);
        exit();

    } catch (Exception $e) {

        echo "Mailer Error: ".$mail->ErrorInfo;

    }

}
?>
