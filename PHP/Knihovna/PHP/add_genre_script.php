<?php
include 'conn.php';

$name = $_POST['gname'];

$stmt = $conn->prepare("INSERT INTO genre (name) VALUES (?);");
$stmt -> bind_param("s", $name);
$stmt->execute();

header("Location: index.php");
?>
