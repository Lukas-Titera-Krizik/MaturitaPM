<?php
include 'conn.php';

$name = $_POST['fname'];
$surname = $_POST['lname'];

$stmt = $conn->prepare("INSERT INTO author (name, surname) VALUES (?, ?);");
$stmt -> bind_param("ss", $name, $surname);
$stmt->execute();

header("Location: index.php");
?>
