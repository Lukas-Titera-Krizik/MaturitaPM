<?php
session_start();
include 'conn.php';

//  Registrace uživatele
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //Hashování hesla
    $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    //$password = password_hash($_POST['psw'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM USER WHERE EMAIL= ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt ->get_result();

    if ($result->num_rows >= 1) {
        $_SESSION['alert'] = '<script>

                alert("Účet s tímto emailem již existuje");

                </script>';

        header("Location: registration.php");
    }else{
        // Příkaz pro databázi
        $sql = "INSERT INTO USER (NAME, SURNAME, EMAIL, TELEPHONE, PASSWORD) VALUES ('$name', '$surname', '$email', '$phone', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['alert'] = '<script>

                alert("Nyní se můžete přihlásit");

                </script>';

            header("Location: login.php");
        }
    }



}else{

}

$conn->close();
?>