<?php
session_start();

unset($_SESSION["mdp"]);
unset($_SESSION["login"]);

if (ini_get("session.use_cookies")) 
    {
        setcookie(session_name(), '', time()-42000);
    }

    session_destroy();

header("Location: index.php");


?>
