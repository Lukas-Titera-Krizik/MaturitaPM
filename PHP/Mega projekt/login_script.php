<?php
session_start();
include 'conn.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['psw'];
    echo $email;
    // Kontrola loginu - pokud není username prázdné a password není prázdný 
    if (!empty($email) && !empty($password)) {
      
        //Najdeme v databázi uživatele s stejným username a heslem. Je tedy nutné aby existoval záznam kde se hodnoty shodují s tím co jsme zadali na webu
        //Zabezpečení proti SQL Injection a SQL Corruption
        $stmt = $conn->prepare("SELECT * FROM USER WHERE EMAIL= ?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $result = $stmt ->get_result();

//Tohle je stará nezabezpečená metoda
        //$sql = "SELECT * FROM USER WHERE EMAIL='$email'";
        //$result = $conn->query($sql);

        //Pokud jsme uživatele našli/ respektive pokud existuje alespoň jeden záznam
        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            


            //Porovnání hesla s hashem
            if (password_verify($password, $result['PASSWORD'])) {
                $_SESSION['userID'] = $result['idUSER'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $result['NAME'];
                $_SESSION['surname'] = $result['SURNAME'];

                $_SESSION['alert'] = '<script>

                alert("Přihlášení proběhlo úspěšně");

                </script>';

                header("Location: account.php");



            // Nastavíme první session proměnnou a to username a přesměrujeme na hlavní stránku
                //header("Location: index.php");

            //Založíme cookie
            //Parametry v pořadí (jméno cookie, data která ukládáme do cookie, čas cookie, dostupnost na serveru, dostupnost na doméně defaultně je pro celou doménu mimo subdomenu, true = poze https komunikace
            //setcookie("username", $username, time() + (86400 * 2), "/", "", true);
            //setcookie("profile_pic", $PROFILE_PIC, time() + (86400 * 2), "/", "", true);


        }else{
                //NASTAVENÍ PROMĚNNÉ, KTERÁ VYPISUJE ALERTY
                $_SESSION['alert'] = '<script>

                alert("Špatně zadaný email nebo heslo");

                </script>';

                header("Location: login.php");
            }
        } else {
            // Špatně zadané hodnoty
            $_SESSION['alert'] = '<script>

                alert("Špatně zadaný email nebo heslo");

                </script>';

            header("Location: login.php");
        }
    } else {
        $_SESSION['alert'] = '<script>

                alert("Musíte zadat username a heslo");

                </script>';

        header("Location: login.php");
    }

}else{
    header("Location: login.php");
}




?>
