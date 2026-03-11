<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>HealthyCare Hospital Manager - Patients</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient bg-info">
<div class="container mt-5">

<div class="mb-4">
<a href="patient.php" class="btn btn-primary active">Manage Patients</a>
<a href="hospital.php" class="btn btn-info">Consultations</a>
</div>

<h2 class="mb-4">HealthyCare Hospital Manager - Patients</h2>

<div class="row">
<div class="col-md-5">
<div class="card p-4 mb-4">
<h4>Add New Patient</h4>
<form action="insert.php" method="POST">
<input type="hidden" name="type" value="patients">
<div class="mb-3">
<input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
</div>
<div class="mb-3">
<input type="number" name="age" class="form-control" placeholder="Age" required>
</div>
<div class="mb-3">
<input type="radio" name="gender" value="Male" id="Male">
<label for="Male">Male</label>
<input type="radio" name="gender" value="Female" id="Female">
<label for="Female">Female</label>
</div>
<div class="mb-3">
<input type="number" name="contact_number" class="form-control" placeholder="Contact Number" required>
</div>
<button type="submit" class="btn btn-success w-100">Add Patient</button>
</form>
</div>
</div>

<div class="col-md-7">
<div class="card p-4">
<h4>Patient List</h4>
<table class="table table-dark table-striped">
<thead>
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Age</th>
<th>Gender</th>
<th>Contact Number</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$result = $conn->query("SELECT * FROM patients");
while($row = $result->fetch_assoc()){
echo "<tr>
<td>".$row['patient_id']."</td>
<td>".$row['full_name']."</td>
<td>".$row['age']."</td>
<td>".$row['gender']."</td>
<td>".$row['contact_number']."</td>
<td>
<a href='update.php?id=".$row['patient_id']."&type=patients' class='btn btn-sm btn-warning'>Edit</a>
<a href='delete.php?id=".$row['patient_id']."&type=patients' class='btn btn-sm btn-danger'>Delete</a>
</td>
</tr>";
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>