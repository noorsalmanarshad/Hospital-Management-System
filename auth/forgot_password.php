<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Forgot Password</title>

<link rel="stylesheet" href="../assets/css/login.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="forgot-container">

<div class="forgot-card">

<i class="fa-solid fa-key forgot-icon"></i>

<h2>Forgot Password</h2>

<p>

Enter your registered email address.

We'll send you a password reset link.

</p>

<form action="send_reset.php" method="POST">

<div class="input-box">

<i class="fa-solid fa-envelope"></i>

<input
type="email"
name="email"
placeholder="Enter Email"
required>

</div>

<button class="login-btn">

Send Reset Link

</button>

</form>

<a href="login.php" class="back-login">

<i class="fa-solid fa-arrow-left"></i>

Back to Login

</a>

</div>

</div>

</body>

</html>