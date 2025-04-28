<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <?php
    include 'conn.php';
    ?>
</head>
<body>

<h1>Add a Genre</h1>

<form action="add_genre_script.php" method="post">
    <label for="gname">Genre name:</label><br>
    <input type="text" id="gname" name="gname" placeholder="Enter name of the genre"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>