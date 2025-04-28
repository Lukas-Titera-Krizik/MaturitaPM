<?php
include 'conn.php';

$name = $_POST['bname'];
$authorID = $_POST['author'];
$genreID = $_POST['genre'];


$stmt = $conn->prepare("INSERT INTO book (name, Author_idAuthor, Genre_idGenre) VALUES (?, ?, ?);");
$stmt -> bind_param("sii", $name, $authorID, $genreID);
$stmt->execute();

header("Location: index.php");

?>
