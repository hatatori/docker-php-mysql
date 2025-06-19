<?php
$servername = "db";  // nome do serviço MySQL no docker-compose
$username = "root";
$password = "1234";

// Caminho para o arquivo .sql
$sqlFile = __DIR__ . '/data.sql';

// Conecta sem selecionar banco (ele será criado pelo script)
$conn = new mysqli($servername, $username, $password);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Lê o conteúdo do arquivo
$sql = file_get_contents($sqlFile);
if (!$sql) {
    die("Erro ao ler o arquivo SQL.");
}

// Executa múltiplas queries
if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());

    echo "Arquivo SQL executado com sucesso!";
} else {
    echo "Erro ao executar SQL: " . $conn->error;
}

$conn->close();
