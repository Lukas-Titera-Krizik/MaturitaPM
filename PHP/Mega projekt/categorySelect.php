<?php
session_start();
include 'conn.php';

//TENTO SKRIPT SLOUŽÍ PRO ZAPSÁNÍ VYBRÁNÝCH KATEGORIÍ Z NAVBARU DO SESSION PROMĚNNÝCH, PRO JEDNODUŠÍ PRÁCI
if(isset($_SESSION['categoryOpt'])){

}else{
    $_SESSION['categoryOpt'] = null;
}

if(isset($_SESSION['mainCategoryOpt'])){

}else{
    $_SESSION['mainCategoryOpt'] = null;
}

$sql = "SELECT NAME FROM CATEGORY";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if(isset($_POST[$row['NAME']])) {
            $_SESSION['mainCategoryOpt'] = $_POST['mainCategory'];
            $_SESSION['categoryOpt'] = $row['NAME'];
            header("Location: category.php");
        }
    }
} else {
    echo "0 results";
}

?>
