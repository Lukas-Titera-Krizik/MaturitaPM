<?php

include 'conn.php';

// Funkce pro upload obrázku
function uploadFile($file) {
//----------------------------------------------------------------------------------------------------------------------
    $target_dir = "pictures/"; // adresář pro uložení obrázku jako takového
    
    //Z orázku který uploadujeme extrahujeme jméno které potřebujeme uložit do databáze
    $target_file = $target_dir . basename($file["name"]);

    $uploadOk = 1; //Kontrolní proměnná
    
    //název změníme na lowercase a zjistíme koncovku souboru. Později tak ověříme že se jedná o obrázek
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola zda se jedná o skutečný obrázek
    //Pokud se jedná o obrázek získáme o obrázku informace včetně MIME (určuje náš uploadOK)
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Soubor není obrázek ";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola velikosti souboru, konkrétně 500KB
    if ($file["size"] > 50000000) {
        echo "Váš obrázek je příliš velký";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola formátu obrázku
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Omlouváme se, ale pouze JPG, JPEG, PNG & GIF jsou povoleny.";
        $uploadOk = 0;
    }
//----------------------------------------------------------------------------------------------------------------------
    // Kontrola všech errorů
    if ($uploadOk == 0) {
        echo "Omlouváme se ale váš obrázek nebyl odeslán.";
    } else {
        // Pokud je vše v pořádku..
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            //Kontrola nepředvídatelného erroru
            echo $target_file;
            echo " Omlouváme se ale váš obrázek nebyl odeslán2.";

            return false;
        }
    }
//----------------------------------------------------------------------------------------------------------------------    
}//KONEC CELÉ FUNKCE





if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $picture_path = uploadFile($_FILES["picture"]);
    $picture_name = $_POST['name'];




    // VKLÁDÁNÍ DO DATABÁZE PRODUKT
    $sql = "INSERT INTO PRODUCT (NAME, PRICE, SIZE, DESCRIPTION) VALUES ('$name', '$price', '$size', '$description')";
    if ($conn->query($sql) === TRUE) {

     echo '<br> <a href="index.php">Main page</a> <br>';
        $product_id = $conn->insert_id;
} else {
    echo "Error: <br>" . $conn->error;
}

    //VKLÁDÁNÍ DO DATABÁZE PICTURE
    $sql = "INSERT INTO PICTURE (NAME ,DIRECTORY, PRODUCT_idPRODUCT) VALUES ('$picture_name' ,'$picture_path', '$product_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Produkt byl úspěšně přidán <br>";
    } else {
        echo "Error: <br>" . $conn->error;
    }

} else {
    echo "Error: <br>" . $conn->error;
}

$conn->close();
?>