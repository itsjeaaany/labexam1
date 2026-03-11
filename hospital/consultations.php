<?php include "config.php"; ?>

<?php
$patients = $conn->query("SELECT * FROM patients");
$consultations = $conn->query("SELECT * FROM consultations");

$consultations = $conn->query("
SELECT o.*, c.doctor_name, c.patient_id,  c.consultation_date, c.diagnosis, c.treatment
FROM consultations o
JOIN patients c ON o.patient_id=c.patient_id
ORDER BY o.consultation_id DESC
");
?>

<?php include "hospital.php"; ?>

<div class="row">
<div class="col-md-5">
<div class="card p-4 mb-4">
<h4>Record New Consultation</h4>
<form action="insert.php" method="POST" class="row g-3">
<input type="hidden" name="type" value="consultations">

<div class="col-12">
<select name="patient_id" class="form-control" required>
<option value="">Select Patient</option>
<?php while($p=$patients->fetch_assoc()): ?>
<option value="<?= $p['patient_id'] ?>">
<?= $p['full_name'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="col-12">
<select name="menu_id" class="form-control" required>
<option value="">Select Patient</option>
<?php while($m=$consultations->fetch_assoc()): ?>
<option value="<?= $m['id'] ?>">
<?= $m['dish'] ?> - ₱<?= $m['price'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="col-12">
<input type="number" name="quantity" value="1" class="form-control" required>
</div>

<div class="col-12">
<button class="btn btn-info w-100">Place</button>
</div>

</form>
</div>
</div>

<div class="col-md-7">
<div class="card p-4">
<h4>Consultations</h4>
<table class="table table-dark table-striped">
<tr>
<th>ID</th><th>Patient</th><th>Doctor</th>
<th>Date</th><th>Diagnosis</th><th>Treatment</th><th>Action</th>
</tr>
<th>Select Patient</th><th>Category</th>
<th>Qty</th><th>Total</th><th>Date</th><th>Action</th>
</tr>

<?php while($o=$consultations->fetch_assoc()): ?>
<tr>
<td><?= $o['consultation_id'] ?></td>
<td><?= $o['full_name'] ?></td>
<td><?= $o['doctor_name'] ?></td>
<td><?= $o['consultation_date'] ?></td>
<td><?= $o['diagnosis'] ?></td>
<td><?= $o['treatment'] ?></td>
<td>
<td>₱<?= $o['total'] ?></td>
<td><?= $o['order_date'] ?></td>
<td>
<a href="update.php?id=<?= $o['id'] ?>&type=order" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $o['id'] ?>&type=order" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</div>