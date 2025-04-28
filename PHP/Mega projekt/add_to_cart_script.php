<?php
session_start();

// Kontrola zda jsou PATH a TITLE nastaveny (jestli jsou správně poslány z index.php)
if (isset($_GET['idPRODUCT'])) {
    //Dekódované hodnoty pro PATH a TITLE.
    $decoded_ID= urldecode($_GET['idPRODUCT']);

    //Vytvoření array pro film který chceme do košíku přidat
    $CART_ITEM = $decoded_ID;

    //Vytvoření košíku
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    //Přidání $CART_ITEM do CART
    array_push($_SESSION['cart'], $CART_ITEM);



     header("Location: basket.php");
    // exit();
} else {

}


?>
