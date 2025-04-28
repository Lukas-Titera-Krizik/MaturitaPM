<?php
session_start();
include 'conn.php';

//TENTO SKRIPT SLOUŽÍ POUZE JAKO KONTROLA, ŽE BYLI SPLNĚNY VŠECHNY PODMÍNKY PŘED OBJEDNÁNÍM

if (isset($_POST['submit'])) {
    //POKUD JE NASTAVEN SUBMIT

    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        //POKUD JE NASTAVEN SESSION CART A NENÍ PRÁZDNÝ

        if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])){
            //POKUD NASTAVEN USER A NENÍ PRÁZDNÝ

            //KONTROLA JESTLI PŘIHLÁŠENÝ USER MÁ ZADANOU ADRESU
            $stmt = $conn->prepare("SELECT idADRESS FROM ADRESS WHERE USER_idUSER LIKE ?");
            $stmt -> bind_param("s", $_SESSION['userID']);
            $stmt -> execute();
            $result = $stmt ->get_result();
            if ($result->num_rows > 0) {

                $_SESSION['order_control'] = true;

                header("Location: order_script.php");




                //sem final command




            }else{
                $_SESSION['alert'] = '<script>

                alert("Nejdřív prosím zadejte adresu");

                </script>';

                header("Location: account.php");
            }



        }else{
            $_SESSION['alert'] = '<script>

            alert("K objednání je nutné se příhlásit");

            </script>';

            header("Location: login.php");
        }

} else {
        $_SESSION['alert'] = '<script>

            alert("V košíku nic není");

            </script>';

        header("Location: basket.php");
}
}

?>
