<?php
$conn = new mysqli("localhost", "root", "", "labexam_butalid");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>