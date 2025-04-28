<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <?php
    include 'conn.php';
    ?>
</head>
<body>

<h1>Add an Author</h1>

<form action="add_author_script.php" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" placeholder="Enter first name"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" placeholder="Enter last name"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>