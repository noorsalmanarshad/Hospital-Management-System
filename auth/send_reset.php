<?php
include("../config/database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer files
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';
require __DIR__ . '/../PHPMailer/src/Exception.php';

$email = trim($_POST['email']);

// DEBUG (remove later if you want)
// var_dump($email); exit;

// check user exists in DB
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    // generate token
    $token = bin2hex(random_bytes(50));

    // save token
    $insert = "INSERT INTO password_resets (email, token)
               VALUES ('$email', '$token')";
    mysqli_query($conn, $insert);

    // reset link
    $resetLink = "http://localhost/subhan-care/auth/reset_password.php?token=$token";

    // PHPMailer start
    $mail = new PHPMailer(true);

    try {

        // 🔥 SMTP SETTINGS
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'noorsalmanarshad@gmail.com';
        $mail->Password = 'uyryyeodbphzngbh'; // your APP PASSWORD

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // EMAIL DETAILS
        $mail->setFrom('noorsalmanarshad@gmail.com', 'Subhan Care');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Password Reset Link";
        $mail->Body = "
            <h3>Password Reset Request</h3>
            <p>Click the link below to reset your password:</p>
            <a href='$resetLink'>$resetLink</a>
        ";

        $mail->send();

        echo "Reset link sent successfully!";

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}
else {
    echo "Email not found in database!";
}
?>
