<?php
session_start();
include 'conn.php';
include 'conn_zlatnik.php';

//TENTO PŘÍKAZ KONTROLUJE JESTLI PROMĚNNÁ order_control Z MINULÉHO SKRIPTU JE NASTAVENA NA TRUE, TÍM SE POTVRZUJE, ŽE BYLI SPLNĚNY VŠECHNY PODMÍNKY
if ($_SESSION['order_control'] == true) {
    $_SESSION['order_control'] = false;

    $time = date("Y-m-d H:i:s");
    $d=strtotime("+7 Days");
    $timeSplatnost = date("Y-m-d H:i:s", $d);

    //TENTO PŘÍKAZ SLOUŽÍ K VYBRÁNÍ PŘÍSLUŠNÝCH DAT Z TABULKY ADRESS
    $stmt = $conn->prepare("SELECT idADRESS FROM ADRESS WHERE USER_idUSER LIKE ?");
    $stmt -> bind_param("s", $_SESSION['userID']);
    $stmt -> execute();
    $result = $stmt ->get_result();
    $adress = $result->fetch_assoc();

    //TENTO PŘÍKAZ SLOUŽÍ K ULOŽENÍ PŘÍSLUŠNÝCH DAT DO TABULKY ORDER
    $stmt = $conn->prepare("INSERT INTO `ORDER` (ORDER_TIME, ADRESS_idADRESS, ADRESS_USER_idUSER) VALUES (?, ?, ?)");
    $stmt -> bind_param("sss", $time, $adress['idADRESS'], $_SESSION['userID']);
    $stmt -> execute();
    $result = $stmt ->get_result();

/*
    TENTO PŘÍKAZ BYCHOM POUŽILI KDYBYCHOM CHTĚLI TIMESTAMP ZAPISOVAT AŽ V DATABÁZI

    $stmt = $conn->prepare("INSERT INTO `ORDER` (ADRESS_idADRESS, ADRESS_USER_idUSER) VALUES (?, ?)");
    $stmt -> bind_param("ss",$adress['idADRESS'], $_SESSION['userID']);
    $stmt -> execute();
    $result = $stmt ->get_result();
*/
    //TENTO PŘÍKAZ SLOUŽÍ K ZAPSÁNÍ ID Z INSERU DO PROMĚNNÉ K POZDĚJŠÍMU POUŽITÍ
    $order_id = $conn->insert_id;

    //TENTO PŘÍKAZ SLOUŽÍ K ZAPSÁNÍ DO DATABÁZE TOLIKRÁT KOLIK JE V KOŠÍKU PRODUKTŮ
    foreach($_SESSION['cart'] as $itemID){
        //TYTO PŘÍKAZY SLOUŽÍ K ZAPSÁNÍ PŘÍSLUŠNÝCH DAT DO TABULKY ORDER_has_PRODUCT
        $stmt = $conn->prepare("INSERT INTO `ORDER_has_PRODUCT` (ORDER_idORDER, PRODUCT_idPRODUCT) VALUES (?, ?)");
        $stmt -> bind_param("ss", $order_id, $itemID);
        $stmt -> execute();
    }

    //ZAČÁTEK INSERTU DO DATABÁZE NA FAKTURY



    //VÝBĚR DAT Z TABULKY ADRESS
    $stmt = $conn->prepare("SELECT * FROM ADRESS WHERE USER_idUSER LIKE ?");
    $stmt -> bind_param("s", $_SESSION['userID']);
    $stmt -> execute();
    $result = $stmt ->get_result();
    $adress = $result->fetch_assoc();

    //TENTO PŘÍKAZ SLOUŽÍ PRO KONTROLU EXISTENCE DAT V TABULCE
    $stmt = $conn_zlatnik->prepare("SELECT * FROM `Adresa` WHERE Ulice LIKE ? AND Psc LIKE ? AND Mesto LIKE ?");
    $stmt -> bind_param("sss", $adress['STREET'], $adress['POSTAL_CODE'], $adress['CITY']);
    $stmt -> execute();
    $result = $stmt ->get_result();

    if($result->num_rows < 1){
        //POSÍLANÍ DAT DO PŘÍSLUŠNÉ TABULKY V JINÉ DATABÁZI
        $stmt = $conn_zlatnik->prepare("INSERT INTO `Adresa` (Ulice, Psc, Mesto) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $adress['STREET'], $adress['POSTAL_CODE'], $adress['CITY']);
        $stmt -> execute();
        //TENTO PŘÍKAZ ULOŽÍ ID PRÁVĚ VYTVOŘENÉHO ZÁZNAMU DO PROMĚNNÉ AdresaID
        $AdresaID = $conn_zlatnik->insert_id;
    }else{
        $row = $result->fetch_assoc();
        $AdresaID = $row['idAdresa'];
        echo "niga";
    }







    //VÝBĚR DAT Z TABULKY KONTAKT
    $stmt = $conn->prepare("SELECT * FROM USER WHERE idUSER LIKE ?");
    $stmt -> bind_param("s", $_SESSION['userID']);
    $stmt -> execute();
    $result = $stmt ->get_result();
    $user = $result->fetch_assoc();
    echo $conn_zlatnik->error;





    //TENTO PŘÍKAZ SLOUŽÍ PRO KONTROLU EXISTENCE DAT V TABULCE
    $stmt = $conn_zlatnik->prepare("SELECT * FROM `Kontakt` WHERE Email LIKE ? AND Telefon LIKE ?");
    $stmt -> bind_param("ss", $user['EMAIL'], $user['TELEPHONE']);
    $stmt -> execute();
    $result = $stmt ->get_result();

    if($result->num_rows < 1){
        //POSÍLANÍ DAT DO PŘÍSLUŠNÉ TABULKY V JINÉ DATABÁZI
        $stmt = $conn_zlatnik->prepare("INSERT INTO `Kontakt` (Email, Telefon) VALUES (?, ?)");
        $stmt -> bind_param("ss", $user['EMAIL'], $user['TELEPHONE']);
        $stmt -> execute();
        $KontaktID = $conn_zlatnik->insert_id;
        echo $conn_zlatnik->error;
    }else{
        $row = $result->fetch_assoc();
        $KontaktID = $row['idKontakt'];
    }







    //TENTO PŘÍKAZ SLOUŽÍ PRO KONTROLU EXISTENCE DAT V TABULCE
    $stmt = $conn_zlatnik->prepare("SELECT * FROM `Uzivatel` WHERE Jmeno LIKE ? AND Prijmeni LIKE ? AND Kontakt_idKontakt LIKE ? AND Adresa_idAdresa LIKE ?");
    $stmt -> bind_param("ssii", $user['NAME'], $user['SURNAME'], $KontaktID, $AdresaID);
    $stmt -> execute();
    $result = $stmt ->get_result();

    if($result->num_rows < 1){
        $stmt = $conn_zlatnik->prepare("INSERT INTO `Uzivatel` (Jmeno, Prijmeni, Kontakt_idKontakt, Adresa_idAdresa) VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("ssii", $user['NAME'], $user['SURNAME'], $KontaktID, $AdresaID);
        $stmt -> execute();
        $UzivatelID = $conn_zlatnik->insert_id;
        echo $conn_zlatnik->error;
    }else{
        $row = $result->fetch_assoc();
        $UzivatelID = $row['idUzivatel'];
    }






    //TENTO PŘÍKAZ VKLÁDÁ DO TABULKY ORDER V DRUHÉ DATABÁZI
    $stmt = $conn_zlatnik->prepare("INSERT INTO `Order` (Datum_obj, Datum_splat, Uzivatel_idUzivatel) VALUES (?, ?, ?)");
    $stmt -> bind_param("sss", $time, $timeSplatnost, $UzivatelID);
    $stmt -> execute();
    $OrderID = $conn_zlatnik->insert_id;
    echo $conn_zlatnik->error;


    //TOTO ZNAMENÁ ŽE BUDOU PŘÍKAZY V PODMÍNCE PROVEDENY TOLIKRÁT KOLIK JE V KOŠÍKU PRODUKTŮ
    foreach($_SESSION['cart'] as $itemID){
        $stmt = $conn->prepare("SELECT * FROM PRODUCT WHERE idPRODUCT LIKE ?");
        $stmt -> bind_param("s", $itemID);
        $stmt -> execute();
        $result = $stmt ->get_result();
        $produkt = $result->fetch_assoc();
        $mnozstvi = 1;
        echo $conn_zlatnik->error;

        $stmt = $conn_zlatnik->prepare("INSERT INTO `Produkt` (Nazev, Cena, Velikost, Mnozstvi) VALUES (?, ?, ?, ?)");
        $stmt -> bind_param("sssi", $produkt['NAME'], $produkt['PRICE'], $produkt['SIZE'], $mnozstvi);
        $stmt -> execute();
        $ProduktID = $conn_zlatnik->insert_id;
        echo $conn_zlatnik->error;

        $stmt = $conn_zlatnik->prepare("INSERT INTO `Order_has_Produkt` (Order_idOrder, Produkt_idProdukt) VALUES (?, ?)");
        $stmt -> bind_param("ss", $OrderID, $ProduktID);
        $stmt -> execute();
        echo $conn_zlatnik->error;
    }


    //PO DOKONČENÍ SKRIPTU SE VYMAŽOU DATA Z KOŠÍKU
    unset($_SESSION['cart']);

    //TENTO PŘÍKAZ NASTAVÍ ALERT NA PŘÍSLUŠNÝ TEXT, KTERÝ SE ZOBRAZÍ V POP UP OKÝNKU NA JÍNÉ STRÁNCE
    $_SESSION['alert'] = '<script>

                alert("Úspěšně objednáno");

                </script>';

    //TENTO PŘÍKAZ PŘESMĚRUJE UŽIVATELE NA INDEX.PHP
    header("Location: index.php");




}

?>
