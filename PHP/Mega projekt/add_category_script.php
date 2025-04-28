<?php

include 'conn.php';


if(isset($_POST['submit'])) {
    $name = $_POST['name'];

    //V PŘÍPADĚ ŽE JE NASTAVEN SUBMIT TAK VLOŽÍ DO TABULKY KATEGORIE ZADANÝ NÁZEV
    $sql = "INSERT INTO CATEGORY (NAME) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {

     echo '<br> <a href="admin.php">Main page</a> <br>';
} else {
    echo "Error: <br>" . $conn->error;
}
}

$conn->close();
?>