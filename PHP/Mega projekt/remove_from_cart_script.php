<?php
session_start();


if(isset($_POST['celyKosik'])){
    //POKUD JE NASTAVENA PROMĚNNÁ CELÝ KOŠÍK TAK SE VYMAŽE CELÝ KOŠÍK
    unset($_SESSION['cart']);
}


$index = $_POST['index'];
echo $index;

//POKUD JE NASTAVEN KOŠÍK TAK SE VYMAŽE POLOŽKA S VYBRANÝM INDEXEM
if (isset($_SESSION['cart'])) {
    array_splice($_SESSION['cart'], $index, 1);
}

     header("Location: basket.php");
    // exit();


?>
