<?php

session_start();

function deleteSession(){

//UKONČENÍ SESSIONU
session_destroy();
    


}

//Cookie delete část
//function deleteCookie($cookieName) {
    
//    setcookie($cookieName, "", time() - 3600, "/");
//}

//deleteCookie("username");
//deleteCookie("profile_pic");
deleteSession();
echo "Uživatel odhlášen.";

header("Location: index.php");

?>
