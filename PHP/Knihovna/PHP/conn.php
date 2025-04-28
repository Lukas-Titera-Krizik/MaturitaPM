<?php
// Deklarace php proměnných
$servername = "localhost";
$username = "root";
$password = " ";
$database = "trenink";


//MYSQLI - MYSQL Improved
$conn = new mysqli($servername, $username, '', $database);

//Ověření spojení
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connection success";
}

/*
//PDO VERZE
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Funguje";
    }catch(PDOException $x){
       echo "Spojení nefunguje" . $x->getMessage();
    }
*/
?>