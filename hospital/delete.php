<?php

include "config.php";

if(isset($_GET['id']) && isset($_GET['type'])){
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    if($type == 'patients'){
        $conn->query("DELETE FROM patients WHERE patient_id='$id'");
        header("Location: patient.php");
    } else {
        $conn->query("DELETE FROM consultations WHERE consultation_id='$id'");
        header("Location: hospital.php");
    }
}

?>