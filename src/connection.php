<?php

$servername = "db";    
$username = "root";
$password = "1234";
$dbname = "cinema";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>
