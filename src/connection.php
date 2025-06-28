<?php

$servername = "db";    
$username = "root";
$password = "1234";
$dbname = "cinema";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password);
    $conn->set_charset("utf8");

    $stmt = $conn->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
    $stmt->bind_param("s", $dbname);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "✅ O banco de dados '$dbname' OK.";
    } else {
        $conn->query("CREATE DATABASE `$dbname` CHARACTER SET utf8 COLLATE utf8_general_ci");
        echo "✅ Banco de dados '$dbname' criado com sucesso.";
         $conn = new mysqli($servername, $username, $password, $dbname);
         $conn->set_charset("utf8");
    }

} catch (mysqli_sql_exception $e) {
    echo "Erro: " . $e->getMessage();
}

?>
