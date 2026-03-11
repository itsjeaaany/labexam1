<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>

<title>HealthyCare Hospital Manager</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-gradient bg-info">
<div class="container mt-5">

<div class="mb-4">
<a href="patient.php" class="btn btn-primary">Manage Patients</a>
<a href="hospital.php" class="btn btn-info active">Consultations</a>
</div>

<h2 class="mb-4">HealthyCare Hospital Manager</h2>

<h4>Record New Consultation</h4>
<form action="insert.php" method="POST">
<div class="row">

<div class="col-md-4">
<select name="patient_id" class="form-control" required>
<option value="">Select Patient</option>

<?php

$result = $conn->query("SELECT * FROM patients");
while($row = $result->fetch_assoc()){
echo "<option value='".$row['patient_id']."'>".$row['full_name']."</option>";
}
?>

</select>
</div>

<div class="col-md-4">
<input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name" required>
</div>

<div class="col-md-4">
<input type="date" name="consultation_date" class="form-control" required>
</div>

<div class="col-md-4">
<input type="text" name="diagnosis" class="form-control" placeholder="Diagnosis">
</div>

<div class="col-md-4">
<input type="text" name="treatment" class="form-control" placeholder="Treatment">
</div>

<div class="col-md-2">
<button type="submit" class="btn btn-success">Save</button>
</div>
</div>
</form>

<hr>

<h4>Consultation Records</h4>
<table class="table table-bordered ">
<thead class= "table-danger">

<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Doctor</th>
<th>Date</th>
<th>Diagnosis</th>
<th>Treatment</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php

$sql = "SELECT consultations.*, patients.full_name 
        FROM consultations
        INNER JOIN patients
        ON consultations.patient_id = patients.patient_id";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
echo "<tr>

<td>".$row['consultation_id']."</td>
<td>".$row['full_name']."</td>
<td>".$row['doctor_name']."</td>
<td>".$row['consultation_date']."</td>
<td>".$row['diagnosis']."</td>
<td>".$row['treatment']."</td>

<td>
<a class='btn btn-sm btn-primary' href='update.php?id=".$row['consultation_id']."'>Edit</a>
<a class='btn btn-sm btn-danger' href='delete.php?id=".$row['consultation_id']."&type=consultation'>Delete</a>
</td>
</tr>";
}
?>
</tbody>
</table>
</div>
</body>
</html>