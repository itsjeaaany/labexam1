<?php

include "config.php";
$id = $_GET['id'];
$type = isset($_GET['type']) ? $_GET['type'] : '';

if(isset($_POST['update'])){
    if($type == 'patients'){
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contact_number = $_POST['contact_number'];
        
        $sql = "UPDATE patients SET
        full_name='$full_name',
        age='$age',
        gender='$gender',
        contact_number='$contact_number'
        WHERE patient_id='$id'";
        
        $conn->query($sql);
        header("Location: patient.php");
    } else {
        $doctor = $_POST['doctor_name'];
        $date = $_POST['consultation_date'];
        $diagnosis = $_POST['diagnosis'];
        $treatment = $_POST['treatment'];
        
        $sql = "UPDATE consultations SET
        doctor_name='$doctor',
        consultation_date='$date',
        diagnosis='$diagnosis',
        treatment='$treatment'
        WHERE consultation_id='$id'";
        
        $conn->query($sql);
        header("Location: hospital.php");
    }
}

if($type == 'patients'){
    $data = $conn->query("SELECT * FROM patients WHERE patient_id='$id'");
} else {
    $data = $conn->query("SELECT * FROM consultations WHERE consultation_id='$id'");
}
$row = $data->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient bg-info">
<div class="container mt-5">
<div class="card p-4" style="max-width: 500px; margin: 0 auto;">
<?php if($type == 'patients'): ?>
<h4>Edit Patient</h4>
<form method="POST">
<div class="mb-3">
<label>Full Name</label>
<input type="text" name="full_name" class="form-control" value="<?php echo $row['full_name']; ?>" required>
</div>
<div class="mb-3">
<label>Age</label>
<input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
</div>
<div class="mb-3">
<label>Gender</label>
<div>
<input type="radio" name="gender" value="Male" id="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
<label for="Male">Male</label>
<input type="radio" name="gender" value="Female" id="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
<label for="Female">Female</label>
</div>
</div>
<div class="mb-3">
<label>Contact Number</label>
<input type="number" name="contact_number" class="form-control" value="<?php echo $row['contact_number']; ?>" required>
</div>
<button type="submit" name="update" class="btn btn-success w-100">Update</button>
</form>
<?php else: ?>
<h4>Edit Consultation</h4>
<form method="POST">
<div class="mb-3">
<label>Doctor Name</label>
<input type="text" name="doctor_name" class="form-control" value="<?php echo $row['doctor_name']; ?>" required>
</div>
<div class="mb-3">
<label>Consultation Date</label>
<input type="date" name="consultation_date" class="form-control" value="<?php echo $row['consultation_date']; ?>" required>
</div>
<div class="mb-3">
<label>Diagnosis</label>
<input type="text" name="diagnosis" class="form-control" value="<?php echo $row['diagnosis']; ?>" required>
</div>
<div class="mb-3">
<label>Treatment</label>
<input type="text" name="treatment" class="form-control" value="<?php echo $row['treatment']; ?>" required>
</div>
<button type="submit" name="update" class="btn btn-success w-100">Update</button>
</form>
<?php endif; ?>
</div>
</div>
</body>
</html>