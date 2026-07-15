<?php

session_start();

if(!isset($_SESSION['patient_email'])){
    header("Location: ../auth/login.php");
    exit();
}

include("../config/database.php");

$email=$_SESSION['patient_email'];

$patient=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM patients WHERE email='$email'")
);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Medical History</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="sidebar">

<h2>Patient Panel</h2>

<ul>

<li>
<i class="fa-solid fa-house"></i>
<a href="dashboard.php">Dashboard</a>
</li>

<li>
<i class="fa-solid fa-user"></i>
<a href="profile.php">My Profile</a>
</li>

<li class="active">
<i class="fa-solid fa-notes-medical"></i>
<a href="medical_history.php">Medical History</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-comment"></i>
<a href="feedback.php">Feedback</a>
</li>

<li>
<i class="fa-solid fa-right-from-bracket"></i>
<a href="../auth/logout.php">Logout</a>
</li>

</ul>

</div>

<div class="main">

<div class="topbar">

<h2>Medical History</h2>

</div>

<div class="form-container">

<form action="save_medical_history.php" method="POST">

<input type="hidden" name="id"
value="<?php echo $patient['id']; ?>">

<div class="input-box">

<label>Allergy</label>

<select name="allergy">

<option value="No"
<?php if($patient['allergy']=="No") echo "selected"; ?>>
No
</option>

<option value="Yes"
<?php if($patient['allergy']=="Yes") echo "selected"; ?>>
Yes
</option>

</select>

</div>

<div class="input-box">

<label>Allergy Details</label>

<textarea
name="allergy_details"
rows="3"><?php echo $patient['allergy_details']; ?></textarea>

</div>

<div class="input-box">

<label>Infection</label>

<select name="infection">

<option value="No"
<?php if($patient['infection']=="No") echo "selected"; ?>>
No
</option>

<option value="Yes"
<?php if($patient['infection']=="Yes") echo "selected"; ?>>
Yes
</option>

</select>

</div>

<div class="input-box">

<label>Infection Details</label>

<textarea
name="infection_details"
rows="3"><?php echo $patient['infection_details']; ?></textarea>

</div>

<div class="input-box">

<label>Chronic Disease</label>

<input type="text"
name="chronic_disease"
value="<?php echo $patient['chronic_disease']; ?>">

</div>

<div class="input-box">

<label>Current Medicines</label>

<textarea
name="current_medicines"
rows="3"><?php echo $patient['current_medicines']; ?></textarea>

</div>

<div class="input-box">

<label>Previous Surgeries</label>

<textarea
name="previous_surgeries"
rows="3"><?php echo $patient['previous_surgeries']; ?></textarea>

</div>

<div class="input-box">

<label>Emergency Contact Name</label>

<input type="text"
name="emergency_contact_name"
value="<?php echo $patient['emergency_contact_name']; ?>">

</div>

<div class="input-box">

<label>Emergency Contact Number</label>

<input type="text"
name="emergency_contact_phone"
value="<?php echo $patient['emergency_contact_phone']; ?>">

</div>

<div class="input-box">

<label>Medical Notes</label>

<textarea
name="medical_notes"
rows="5"><?php echo $patient['medical_notes']; ?></textarea>

</div>

<br>

<button class="save-btn">

<i class="fa-solid fa-floppy-disk"></i>

Save Medical History

</button>

</form>

</div>

</div>

</body>

</html>