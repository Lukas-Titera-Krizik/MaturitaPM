<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Muži | Titolo Eclat</title>
    <?php
    session_start();
    include 'conn.php';
    ?>
  <style>
    body, html {
      margin: 0;
      font-family: Arial, sans-serif;
      background: black;

      background-attachment: fixed;
      background-image: url("pictures/background.jpg");

      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    /*------ZDE ZAČÍNÁ NAVBAR------*/

    header {
        top: 0;
        width: 100%;
        position: fixed;
        float: left;
        background-color: #4b2f2f;
        color: white;
        align-items: center;
        display: flex;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
        z-index: 1;
    }

    #logo{
        text-align: center;
        float: left;
        width: 20%;
    }

    #logo a{
        text-shadow: 2px 2px rgba(0,0,0,0.8);
        text-decoration: none;
        color: white;
        font-family: 'Brush Script MT', cursive;
        font-size: 40px;
    }

    #leftNav {
        width: 40%;
        float: left;
    }

    #leftNav button {
        color: white;
        text-decoration: none;
        font-size: large;
        margin: 0 15px;
        border: none;
        background-color: #4b2f2f;
    }

    nav button {
        text-decoration: underline;
    }

    .navBt{
        list-style-type: none;
        padding: 0;
        overflow: hidden;
        font-size: large;
        margin: 0px;
        margin-top: 5px;
        border: none;
        background-color: #4b2f2f;
        float: right;
    }
    .navBt a{
        text-decoration: none;
        color: white;
    }

    .navBt:hover{
        text-decoration: underline;
    }

    #rightNav {
        text-align: right;
        font-size: large;
        width: 40%;
        float: left;
        margin: 0px;
    }

    #rightNav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content input {
        color: black;
        text-align: left;
        width: 100%;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border: none;
        background: none;
        font-size: large;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown {
        float: left;
        position: relative;
        display: inline-block;
    }
    .dropdown-content input:hover {background-color: #f1f1f1}



    #leftNav button:hover{
        text-decoration: underline;
    }

    .searchBar{

        margin-right: 10px;
        float: right;
    }

    .searchBar input{
        padding: 5px;

    }

    /*Zde končí navbar*/



    .Nadpis{
        margin: auto;
        margin-top: 160px;
        margin-bottom: 0px;
        text-align: center;
        color: white;
        font-weight: bold;
        -webkit-text-fill-color: white;
        -webkit-text-stroke: 2.5px;
        -webkit-text-stroke-color: black;
        font-size: 60px;
    }


    .filtry{
        margin-left: 15%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
        border-radius: 25px;
        position: absolute;
        background: #573e3e;
        width: 14%;
        height: 500px;
        text-align: center;
    }

    #filtryNadpis{
        box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.8);
        margin: 20px;
        padding: 5px;
        color: white;
        font-size: 20px;
        font-weight: bold;
        border-radius: 25px;
        background: #755b5b;
    }


    .ProhlizecProduktu{
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
        border-radius: 45px;
        background: #573e3e;
        float: right;
        margin-right: 14%;
        width: 55%;
        overflow: hidden;
    }

    /*Zde začíná provedení jednotlivých produtků*/
    .Produkt{
        box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.8);
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        width: 95%;
        background: gray;
        border-radius: 25px;
        height: 250px;
        overflow: visible;
    }

    .ProduktObrazek{
        height: 210px;
        margin: 20px;
        border-radius: 15px;
        float: left;
        width: 210px;
        background-color: white;
        display: inline-block;
    }

    .obrazek{
        width: 100%;
        height: 100%;
        border-radius: 15px;
    }

    .ProduktPopisek{
        margin: 20px;
        height: 210px;
        width: 28%;
        float: left;
        display: inline-block;
    }

    .ProduktPopisek a{
        display: block;
        margin-bottom: 10px;
        color: white;
    }

    .ProduktPopisek a.ProduktNazev{
        font-size: 30px;
    }

    .ProduktTlacitko{
        float: right;
        width: 28%;
        height: 210px;
        margin: 20px;
    }

    .PridatButton{
        padding: 5px;
        border-radius: 25px;
        box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.8);
        background: #755b5b;
        border: none;
        margin: auto;
        margin-top: 20px;
        color: white;
        font-size: 30px;
        justify-content: center;
        text-align: center;

    }

    .PridatButton:hover{
        background: gray;
    }

    .ProduktCena{
        color: white;
        font-size: 40px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .tlacitko{
        text-align: center;
    }

    /*Zde končí provedení jednotlivých produtků*/

    footer{
      margin: 0;
      margin-top: 100px;
      display: block;
      text-decoration: none;
      float: left;
      width: 100%;
      height: 60px;
      background-color: #4b2f2f;
    }

    .footerObsah{
      margin: auto;
      margin-top: 5px;
      text-align: center;
      font-size: large;
    }

    .footerObsah a{
      text-decoration: none;
      color: white;
    }

    .footerObsah a:hover{
      color: white;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header>

    <nav id="leftNav">
        <div class="dropdown">
            <button class="dropBtn">Muži</button>
            <form class="dropdown-content" action="categorySelect.php" method="post">
                <?php
                $sql = "SELECT NAME FROM CATEGORY";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['NAME'] != "Pánské" && $row['NAME'] != "Dámské" && $row['NAME'] != "Dětské"){


                            $category = "Pánské";
                            $subcategory = $row['NAME'];
                            $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME = '$category'";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {

                                    $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME ='" . $subcategory . "'  AND PRODUCT.NAME = '" . $row1["NAME"] . "'";
                                    $result2 = $conn->query($sql);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                            echo '<input type="hidden" name="mainCategory" value="Pánské"/>';
                                            echo '<input type="submit" name="' . $row['NAME'] . '" value="' . $row['NAME'] . '"/>' ;
                                        }
                                    }
                                }
                            } else {
                                echo "0 results";
                            }



                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </form>
        </div>



        <div class="dropdown">
            <button class="dropBtn">Ženy</button>
            <form class="dropdown-content" action="categorySelect.php" method="post">
                <?php
                $sql = "SELECT NAME FROM CATEGORY";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['NAME'] != "Pánské" && $row['NAME'] != "Dámské" && $row['NAME'] != "Dětské"){


                            $category = "Dámské";
                            $subcategory = $row['NAME'];
                            $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME = '$category'";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {

                                    $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME ='" . $subcategory . "'  AND PRODUCT.NAME = '" . $row1["NAME"] . "'";
                                    $result2 = $conn->query($sql);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                            echo '<input type="hidden" name="mainCategory" value="Dámské"/>';
                                            echo '<input type="submit" name="' . $row['NAME'] . '" value="' . $row['NAME'] . '"/>' ;
                                        }
                                    }
                                }
                            } else {
                                echo "0 results";
                            }



                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </form>
        </div>

        <div class="dropdown">
            <button class="dropBtn">Děti</button>
            <form class="dropdown-content" action="categorySelect.php" method="post">
                <?php
                $sql = "SELECT NAME FROM CATEGORY";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['NAME'] != "Pánské" && $row['NAME'] != "Dámské" && $row['NAME'] != "Dětské"){


                            $category = "Dětské";
                            $subcategory = $row['NAME'];
                            $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME = '$category'";
                            $result1 = $conn->query($sql);
                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {

                                    $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT, PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY, CATEGORY.NAME AS CATEGORYNAME
FROM PRODUCT_has_CATEGORY
JOIN PRODUCT ON PRODUCT.idPRODUCT = PRODUCT_has_CATEGORY.PRODUCT_idPRODUCT
JOIN CATEGORY ON CATEGORY.idCATEGORY = PRODUCT_has_CATEGORY.CATEGORY_idCATEGORY
WHERE CATEGORY.NAME ='" . $subcategory . "'  AND PRODUCT.NAME = '" . $row1["NAME"] . "'";
                                    $result2 = $conn->query($sql);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                            echo '<input type="hidden" name="mainCategory" value="Dětské"/>';
                                            echo '<input type="submit" name="' . $row['NAME'] . '" value="' . $row['NAME'] . '"/>' ;
                                        }
                                    }
                                }
                            } else {
                                echo "0 results";
                            }



                        }
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </form>
        </div>


    </nav>

    <div id="logo">
        <a href="index.php">Titolo Eclat</a>
    </div>

    <nav id="rightNav">
        <form id="searchBar" name="searchBar" class="searchBar" method="post" action="search_result.php">
            <input type="text" name="search" placeholder="Vyhledat...">
        </form>
        <div class="navBt"><a href="basket.php">Košík</a></div>
        <div class="navBt"><a href="login.php">Účet</a></div>
    </nav>

    <script>
        const form = document.querySelector('searchBar');

        form.addEventListener('keypress', function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                form.submit();
            }
        });
    </script>


</header>
<div class="Nadpis">
    <div class="Nadpis">
        <?php
        echo ' 
  <p>Výsledky hledání pro "' . $_POST['search'] . '"</p>
  ';
        ?>

    </div>
</div>

<div class="filtry">
  <div id="filtryNadpis">
    <a>Filtry</a>
  </div>
</div>

<div class="ProhlizecProduktu">
    <?php

            //VYHLEDÁNÍ VŠECH PRODUKTŮ, KTERÉ OBSAHUJÍ UŽIVATELEM ZADANÝ NÁZEV
            $sql = "SELECT PRODUCT.idPRODUCT, PRODUCT.NAME, PRODUCT.SIZE, PRODUCT.PRICE, PRODUCT.DESCRIPTION, PICTURE.PRODUCT_idPRODUCT, PICTURE.DIRECTORY
FROM PRODUCT
JOIN PICTURE ON PICTURE.PRODUCT_idPRODUCT = PRODUCT.idPRODUCT
WHERE PRODUCT.NAME like '%" . $_POST["search"] . "%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    //KONTROLA ŽE SI PRODUKT UŽ NĚKDO NEKOUPIL
                    $sqlZakoupeni = "SELECT * FROM ORDER_has_PRODUCT WHERE PRODUCT_idPRODUCT = '" . $row['idPRODUCT'] . "'";
                    $overeniZakoupeni = $conn->query($sqlZakoupeni);

                    if($overeniZakoupeni->num_rows < 1){
                        //VÝPIS PRODUKTU
                        echo
                            '<div class="Produkt">
                        <div class="ProduktObrazek">
                        <img class="obrazek" src="' . $row["DIRECTORY"] . '" alt="' . $row["NAME"] . '" >
                        </div>
                        <div class="ProduktPopisek">
                        <a class="ProduktNazev">' . $row["NAME"] . '</a>
                        <a>' . $row["DESCRIPTION"] . '</a>
                        <a>Velikost: ' . $row["SIZE"] . '</a>
                        </div>';


                        echo '<div class="ProduktTlacitko">
                          <p class="ProduktCena">'. $row["PRICE"] .' Kč</p>';

                        $vKosiku = false;
                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $itemID){
                                if($itemID == $row['idPRODUCT'] && $vKosiku == false){
                                    $vKosiku = true;
                                }
                            }
                        }

                        if($vKosiku == false){
                            echo '
                            <form class="tlacitko" action="add_to_cart_script.php">
                        <input type="hidden" name="idPRODUCT" value="'. $row["idPRODUCT"] .'">
                        <input type="submit" name="submit" class="PridatButton" value="Přidat do košíku">
                        </form>
                            ';
                        }else{
                            echo '
                            <div class="tlacitko">
                        <input type="submit" class="PridatButton" value="Produkt je v košíku">
                        </div>
                            ';
                        }

                        echo '</div>';

                        echo '</div>';
                    }


                }


    }
    ?>
</div>

<footer>
  <div class="footerObsah">
    <a href="contact.php">Kontakt</a>
  </div>
  <div class="footerObsah">
    <a href="aboutus.php">O nás</a>
  </div>
</footer>

</body>
</html>
