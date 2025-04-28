<?php
        // Deklarace php proměnných
        $servername = "127.0.0.1:3306";
        $username = "jirizlatnik";
        $password = "Cyr89Zap468HMHK";
        $database = "jirizlatnik";


        //MYSQLI - MYSQL Improved
        $conn_zlatnik = new mysqli($servername, $username, $password, $database);

        //Ověření spojení
        if ($conn_zlatnik->connect_error) {
            die("Connection failed: " . $conn_zlatnik->connect_error);
        } else {
            echo "Connection success";
        }


//PDO VERZE
//    try{
//        $conn_zlatnik = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//        $conn_zlatnik->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Funguje";
//    }catch(PDOException $x){
//        echo "Spojení nefunguje" . $x->getMessage();
//    }
      ?>













