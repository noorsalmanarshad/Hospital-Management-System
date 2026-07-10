<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reset Password</title>

<link rel="stylesheet" href="../assets/css/login.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="forgot-container">

<div class="forgot-card">

<i class="fa-solid fa-lock forgot-icon"></i>

<h2>Reset Password</h2>

<p>Enter your new password.</p>

<form action="update_password.php" method="POST">

<input
type="hidden"
name="email"
value="<?php echo htmlspecialchars($_GET['email']); ?>">

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input
type="password"
name="password"
placeholder="New Password"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

</div>

<button class="login-btn">

Update Password

</button>

</form>

</div>

</div>

</body>

</html>