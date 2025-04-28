<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <?php
    include 'conn.php';
    ?>
</head>
<body>

<h1>Add a Book</h1>

<form action="add_book_script.php" method="post">
    <label for="bname">Book name:</label><br>
    <input type="text" id="bname" name="bname" placeholder="Enter name of the book"><br><br>

    <label for="author">Choose an Author:</label>
    <select name="author" id="author">
        <?php
        $sql = "SELECT * FROM author";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()){
            echo '<option value="' . $row['idAuthor'] . '">' . $row['name'] . ' ' . $row['surname'] .'</option>';
        }
        ?>

    </select><br><br>

    <label for="genre">Choose a Genre:</label>
    <select name="genre" id="genre">
        <?php
        $sql = "SELECT * FROM genre";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()){
            echo '<option value="' . $row['idGenre'] . '">' . $row['name'] . '</option>';
            //<option value="volvo">Volvo</option>
        }
        ?>

    </select><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>