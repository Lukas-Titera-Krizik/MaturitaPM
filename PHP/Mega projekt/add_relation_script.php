<?php

include 'conn.php';


if(isset($_POST['submit'])) {
    $product = $_POST['product'];
    $category = $_POST['category'];


    //VKLÁDÁNÍ DO TABULKY PRODUCT_has_CATEGORY
    $sql = "INSERT INTO PRODUCT_has_CATEGORY (PRODUCT_idPRODUCT, CATEGORY_idCATEGORY) VALUES ('$product', '$category')";
    if ($conn->query($sql) === TRUE) {

        echo '<br> <a href="admin.php">Main page</a> <br>';
    } else {
        echo "Error: <br>" . $conn->error;
    }

}

$conn->close();
?>