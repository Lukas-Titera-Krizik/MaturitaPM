<?php

include 'conn.php';
session_start();

if(isset($_POST['submit'])) {
    $city = $_POST['city'];
    $street = $_POST['street'];
    $postal_code = $_POST['psc'];

    if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])){

        //VÝBĚR Z TABULKY ADRESS S PŘÍSLUŠNÝM UŽIVATELSKÝM ID
        $stmt = $conn->prepare("SELECT * FROM ADRESS WHERE USER_idUSER LIKE ?");
        $stmt -> bind_param("s", $_SESSION['userID']);
        $stmt -> execute();
        $result = $stmt ->get_result();

        if ($result->num_rows > 0) {

            //V PŘÍPADĚ, ŽE EXITUJE ZÁZNAM V TABULCE ADRESS, TAK SE PŘEPÍŠE
            $stmt = $conn->prepare("UPDATE ADRESS SET CITY = ?, STREET = ?, POSTAL_CODE = ? WHERE USER_idUSER = ?;");
            $stmt -> bind_param("ssss", $city, $street, $postal_code, $_SESSION['userID']);
            $stmt -> execute();

        }else{

            //V PŘÍPADĚ, ŽE NEEXISTUJE ZÁZNAM V TABULCE ADRESS, TAK SE VLOŽÍ
            $stmt = $conn->prepare("INSERT INTO ADRESS (`CITY`, `STREET`, `POSTAL_CODE`, `USER_idUSER`) VALUES (?, ?, ?, ?)");
            $stmt -> bind_param("ssss", $city, $street, $postal_code, $_SESSION['userID']);
            $stmt -> execute();

        }
    }
}

header("Location: account.php");
$conn->close();
?>