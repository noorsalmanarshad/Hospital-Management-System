<?php
include("../config/database.php");

$token = $_GET['token'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Set New Password</h2>

<form action="update_password.php" method="POST">
    
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <input type="password" name="password" placeholder="New Password" required>

    <button type="submit">Update Password</button>

</form>

</body>
</html>