<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <?php
    include 'conn.php';
    ?>
</head>
<body>


<?php
$bookID = $_GET['bookID'];

$sql = "SELECT book.name AS bookName, genre.name AS genreName, author.name AS authorName, author.surname AS authorSurname
        FROM book
        INNER JOIN genre ON book.Genre_idGenre = genre.idGenre
        INNER JOIN author ON book.Author_idAuthor = author.idAuthor
        WHERE book.idBook = " . $bookID;

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    echo '<h1> ' . $row['bookName'] . '</h1>';
    echo "<p>Author: " . $row['authorName'] . " " . $row['authorSurname'] . '</p>';
    echo '<p>Genre: ' . $row['genreName'] . '</p>';
}

?>

</body>
</html>