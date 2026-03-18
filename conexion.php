<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "prestamos_db";

$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_error){
die("Error de conexión");
}

?>