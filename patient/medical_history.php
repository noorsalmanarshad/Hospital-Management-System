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

<li>
<i class="fa-solid fa-user-doctor"></i>
<a href="doctor.php">My Doctor</a>
</li>

<li>
<i class="fa-solid fa-calendar-check"></i>
<a href="appointments.php">Appointments</a>
</li>

<li>
<i class="fa-solid fa-flask"></i>
<a href="laboratory.php">Laboratory</a>
</li>

<li>
<i class="fa-solid fa-file-prescription"></i>
<a href="prescriptions.php">Prescriptions</a>
</li>

<li>
<i class="fa-solid fa-money-bill"></i>
<a href="bills.php">Bills</a>
</li>

<li class="active">
<i class="fa-solid fa-notes-medical"></i>
<a href="medical_history.php">Medical History</a>
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
rows="3"
placeholder="Enter allergy details if any..."><?php echo $patient['allergy_details']; ?></textarea>

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
rows="3"
placeholder="Enter infection details if any..."><?php echo $patient['infection_details']; ?></textarea>

</div>

<div class="input-box">

<label>Chronic Disease</label>

<select name="chronic_disease">

<option value="">-- Select Disease --</option>

<option value="None" <?php if($patient['chronic_disease']=="None") echo "selected"; ?>>None</option>

<option value="Diabetes" <?php if($patient['chronic_disease']=="Diabetes") echo "selected"; ?>>Diabetes</option>

<option value="Hypertension (High Blood Pressure)" <?php if($patient['chronic_disease']=="Hypertension (High Blood Pressure)") echo "selected"; ?>>Hypertension (High Blood Pressure)</option>

<option value="Asthma" <?php if($patient['chronic_disease']=="Asthma") echo "selected"; ?>>Asthma</option>

<option value="Heart Disease" <?php if($patient['chronic_disease']=="Heart Disease") echo "selected"; ?>>Heart Disease</option>

<option value="Kidney Disease" <?php if($patient['chronic_disease']=="Kidney Disease") echo "selected"; ?>>Kidney Disease</option>

<option value="Liver Disease" <?php if($patient['chronic_disease']=="Liver Disease") echo "selected"; ?>>Liver Disease</option>

<option value="Cancer" <?php if($patient['chronic_disease']=="Cancer") echo "selected"; ?>>Cancer</option>

<option value="Epilepsy" <?php if($patient['chronic_disease']=="Epilepsy") echo "selected"; ?>>Epilepsy</option>

<option value="Thyroid Disorder" <?php if($patient['chronic_disease']=="Thyroid Disorder") echo "selected"; ?>>Thyroid Disorder</option>

<option value="Tuberculosis (TB)" <?php if($patient['chronic_disease']=="Tuberculosis (TB)") echo "selected"; ?>>Tuberculosis (TB)</option>

<option value="Hepatitis B" <?php if($patient['chronic_disease']=="Hepatitis B") echo "selected"; ?>>Hepatitis B</option>

<option value="Hepatitis C" <?php if($patient['chronic_disease']=="Hepatitis C") echo "selected"; ?>>Hepatitis C</option>

<option value="HIV/AIDS" <?php if($patient['chronic_disease']=="HIV/AIDS") echo "selected"; ?>>HIV/AIDS</option>

<option value="Arthritis" <?php if($patient['chronic_disease']=="Arthritis") echo "selected"; ?>>Arthritis</option>

<option value="Chronic Obstructive Pulmonary Disease (COPD)" <?php if($patient['chronic_disease']=="Chronic Obstructive Pulmonary Disease (COPD)") echo "selected"; ?>>Chronic Obstructive Pulmonary Disease (COPD)</option>

<option value="Other" <?php if($patient['chronic_disease']=="Other") echo "selected"; ?>>Other</option>

</select>

</div>

<div class="input-box">

<label>Current Medicines</label>

<textarea
name="current_medicines"
rows="3"
placeholder="Enter current medicines you are taking..."><?php echo $patient['current_medicines']; ?></textarea>

</div>

<div class="input-box">

<label>Previous Surgeries</label>

<textarea
name="previous_surgeries"
rows="3"
placeholder="Enter previous surgeries (if any)..."><?php echo $patient['previous_surgeries']; ?></textarea>

</div>

<div class="input-box">

<label>Emergency Contact Name</label>

<input
type="text"
name="emergency_contact_name"
placeholder="Enter emergency contact person's name"
value="<?php echo $patient['emergency_contact_name']; ?>">

</div>

<div class="input-box">

<label>Emergency Contact Number</label>

<input
type="text"
name="emergency_contact_phone"
placeholder="0000-0000000"
value="<?php echo $patient['emergency_contact_phone']; ?>">

</div>

<div class="input-box">

<label>Medical Notes</label>

<textarea
name="medical_notes"
rows="5"
placeholder="Enter any additional medical notes..."><?php echo $patient['medical_notes']; ?></textarea>

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