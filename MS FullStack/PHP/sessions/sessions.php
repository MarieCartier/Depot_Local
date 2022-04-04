<?php 
session_start();
$_SESSION["login"] = "MarieCartier";
$_SESSION["role"] = "admin";

echo"- session ID : ".session_id()."<br>";
echo "- login : ".$_SESSION["login"];

var_dump($_SESSION);


?>