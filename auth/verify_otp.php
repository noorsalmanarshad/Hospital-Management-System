<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Verify OTP</title>

<link rel="stylesheet" href="../assets/css/login.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="forgot-container">

<div class="forgot-card">

<h2>Verify OTP</h2>

<p>Enter the OTP sent to your email.</p>

<form action="check_otp.php" method="POST">

<input
type="hidden"
name="email"
value="<?php echo htmlspecialchars($_GET['email']); ?>">

<div class="input-box">

<input
type="text"
name="otp"
placeholder="Enter 6-digit OTP"
maxlength="6"
required>

</div>

<button class="login-btn">

Verify OTP

</button>

</form>

<p style="margin-top:15px; text-align:center;">
    Didn't receive the OTP?
</p>

<form action="send_otp.php" method="POST">

    <input type="hidden"
           name="email"
           value="<?php echo htmlspecialchars($_GET['email']); ?>">

    <button class="login-btn" type="submit">

        Resend OTP

    </button>

</form>

</div>

</div>

</body>

</html>