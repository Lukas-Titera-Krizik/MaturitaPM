<!DOCTYPE html>
<html>
<head>
    <script src="jquery-3.7.1.min.js"></script>
  <meta charset=utf-8>
  <title>Domů | Titolo Eclat</title>
    <?php
    session_start();
    include 'conn.php';

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
      margin: auto;
      top: 20%;
      text-align: left;
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
  <p>Kdo jsme</p>
</div>

<div class="Obsah">
  <div class="ObsahText">
    <a>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer in sapien.
      Praesent vitae arcu tempor neque lacinia pretium. Nulla accumsan, elit sit amet varius semper,
      nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Excepteur sint occaecat cupidatat
      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nullam eget nisl.
      Morbi scelerisque luctus velit. Aliquam id dolor. Aenean placerat. Temporibus autem quibusdam
      et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint
      et molestiae non recusandae.</a>
  </div>
</div>

<div class="Nadpis">
  <p>V souznění s přírodou</p>
</div>

<div class="Obsah">
  <div class="ObsahText">
    <a>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer in sapien.
      Praesent vitae arcu tempor neque lacinia pretium. Nulla accumsan, elit sit amet varius semper,
      nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Excepteur sint occaecat cupidatat
      non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nullam eget nisl.
      Morbi scelerisque luctus velit. Aliquam id dolor. Aenean placerat. Temporibus autem quibusdam
      et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint
      et molestiae non recusandae.</a>
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