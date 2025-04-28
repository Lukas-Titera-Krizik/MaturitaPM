<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Domů | Titolo Eclat</title>
    <?php
    session_start();
    include 'conn.php';

    //TENTO PŘÍKAZ PŘESMĚRUJE UŽIVATELE NA LOGIN JESTLIŽE NENÍ NASTAVENA PROMĚNNÁ EMAIL (TA SE NASTAVUJE V LOGIN SCRIPUT, TUDÍŽ UŽIVATEL NENÍ PŘIHLÁŠEN)
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    }

    //TENTO PŘÍKAZ VYPÍŠE PROMĚNNOU ALERT V PŘÍPADĚ, ŽE JE NASTAVENA, NÁSLEDNĚ JI VYMAŽE
    if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
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



    .Obsah{
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.8);
      border-radius: 25px;
      background: #573e3e;
      margin: auto;
      margin-bottom: 300px;
        width: 70%;
      display: flex;
    }

    .ObsahText{
      font-size: 30px;
      padding: 20px;
      filter: none;
      color: white;
      font-weight: bold;
      margin: 10px;
      top: 20%;
      text-align: left;
        width: 100%;
    }

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

    footer{
      margin: 0;
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

    .ObsahText div{
        display: inline-block;
    }

    .userInfo form{
        text-align: center;
    }

    .adress form{
        text-align: center;
    }

    .Button{
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

    .Button:hover{
        background: gray;
    }

    .prohlizecObjednavek{
        box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.8);
        width: 40%;
        background: gray;
        border-radius: 25px;
        float: right;
        font-size: 15px;
        height: 170px;
        overflow: auto;


    }

    .prohlizecObjednavek a{
        margin: 5px;
        display: block;
    }

    .prohlizecObjednavek table{

        display: block;
    }

    .viceInfoOdkaz{
        text-decoration: underline;
        color: blue;
    }


    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .prohlizecObjednavekObsah{
        margin: 15px;
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

                //NAVBAR POPSÁN V aboutus.php

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
  <p>Váš účet</p>
</div>

<div class="Obsah">
  <div class="ObsahText">
    <div class="userInfo">
        <?php
        session_start();

            //TYTO PŘÍKAZY VYPÍŠÍ PROMĚNNÉ ZE SESSION, KTERÉ BYLY ULOŽENY PO PŘIHLÁŠENÍ UŽIVATELE

        echo
            "<a>Jméno: " . $_SESSION['name'] . "</a><br>
                <a>Příjmení: " . $_SESSION['surname'] . "</a><br>
                <a>Email: " . $_SESSION['email'] . "</a><br>"
        ;


        ?>

        <form action="logout.php">

                <input class="Button" type="submit" name="submit" value="Odhlásit">

        </form>
    </div>
      <div class="adress">
          <?php
          session_start();
          $stmt = $conn->prepare("SELECT * FROM ADRESS WHERE USER_idUSER LIKE ?");
          $stmt -> bind_param("s", $_SESSION['userID']);
          $stmt -> execute();
          $result = $stmt ->get_result();

          //POKUD MÁ UŽIVATEL NĚJAKOU ADRESU TAK JÍ VYPÍŠE

          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();

              echo
                  "<a>Město: " . $row['CITY'] . "</a><br>
                <a>Ulice: " . $row['STREET'] . "</a><br>
                <a>PSČ: " . $row['POSTAL_CODE'] . "</a><br>"
              ;

          }
          ?>
          <form action="change_adress.php">
              <?php
              //TLAČÍTKO ODKAZUJÍCÍ NA ZMĚNU/ZADÁNÍ ADRESY
              session_start();
              if ($result->num_rows > 0) {
                  echo '<input class="Button" type="submit" name="submit" value="Změnit adresu">';
              }else{
                  echo '<input class="Button" type="submit" name="submit" value="Zadat adresu">';
              }
              ?>
          </form>
      </div>
      <div class="prohlizecObjednavek">
          <div class="prohlizecObjednavekObsah">
        <a>Vaše objednávky:</a>
          <div class="seznamObjednavek">
              <table>
                  <tr>
                      <th>ID Zásilky</th>
                      <th>Čas objednání</th>
                  </tr>
              <?php
              $sql = "SELECT `ORDER`.`idORDER`, `ORDER`.`ORDER_TIME` FROM `ORDER` WHERE ADRESS_USER_idUSER = '" . $_SESSION['userID'] . "'";
              $result = $conn->query($sql);

              //VÝBĚR VŠECH OBJEDNÁVEK UŽIVATELE A JEJICH NÁSLEDNÝ VÝPIS

              while($row = $result->fetch_assoc()) {
                  echo "
                  <tr>
                      <td>". $row['idORDER'] ."</td>
                      <td>". $row['ORDER_TIME'] ."</td>
                  </tr>
                  ";
              }

              ?>
              </table>
              <a class="viceInfoOdkaz" href="https://project.skolakrizik.cz/~jirizlatnik/">Více informací na fakturačních stránkách</a>
          </div>
          </div>

      </div>


  </div>
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