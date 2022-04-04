<?php
session_start();

unset($_SESSION["mdp"]);
unset($_SESSION["login"]);

header("Location: index.php");


?>