<?php

include "config.php";

if($_POST['type'] == 'patients'){
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    
    $sql = "INSERT INTO patients 
    (full_name, age, gender, contact_number)
    VALUES 
    ('$full_name','$age','$gender','$contact_number')";
    
    $conn->query($sql);
    header("Location: patient.php");
} else {
    $patient_id = $_POST['patient_id'];
    $doctor = $_POST['doctor_name'];
    $date = $_POST['consultation_date'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];

    $sql = "INSERT INTO consultations 
    (patient_id, doctor_name, consultation_date, diagnosis, treatment)
    VALUES 
    ('$patient_id','$doctor','$date','$diagnosis','$treatment')";

    $conn->query($sql);
    header("Location: hospital.php");
}

?>