<?php
require_once('./connection.php');
echo "<br><br>";
$arquivoSQL = './data.sql';
$sql = file_get_contents($arquivoSQL);

if ($sql === false) {
    die("❌ Erro ao ler o arquivo SQL.");
}

try {
    if ($conn->multi_query($sql)) {
        do {
            if ($resultado = $conn->store_result()) {
                $resultado->free();
            }
        } while ($conn->next_result());
        echo "✅ Arquivo SQL executado com sucesso.";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "❌ Erro: Já existe um registro com esse ID (entrada duplicada).";
    } else {
        echo "❌ Erro ao executar SQL: " . $e->getMessage() . " (Código: " . $e->getCode() . ")";
    }
}
?>
