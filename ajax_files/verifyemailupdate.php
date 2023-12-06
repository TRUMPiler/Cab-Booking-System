<?php

$_SESSION["fname"]=$_POST["fname"];
$_SESSION["mname"]=$_POST["mname"];
$_SESSION["lname"]=$_POST["lname"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["address"]=$_POST["address"];
$_SESSION["gender"]=$_POST["gender"];
$_SESSION["dob"]=$_POST["dob"];
$_SESSION["contact"]=$_POST["contact"];
$_SESSION["url"]="./ajax_files/checkupdate.php";
echo "true";
?>