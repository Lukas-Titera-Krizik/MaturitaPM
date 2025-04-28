<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <?php
    include 'conn.php';
    ?>
</head>
<body>

<h1>Welcome to the library</h1>
<a href="add_book_form.php">Add a book</a> <br>
<a href="add_author_form.php">Add an author</a> <br>
<a href="add_genre_form.php">Add a genre</a> <br>

<h2>Our books:</h2>

<?php
$sql = "SELECT book.idBook AS idBook, book.name AS bookName FROM book";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    echo '<a href="book_detail.php/?bookID=' . $row['idBook'] . '"> ' . $row['bookName'] . '</a> <br>';
}

?>

</body>
</html>