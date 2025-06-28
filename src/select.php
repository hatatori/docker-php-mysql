<style> td{white-space: nowrap} </style>


<?php
require_once('./connection.php');
require_once('./insert.php');
 
// Consulta para pegar colunas da tabela filmes
echo "<br><br>";

$sql = "SELECT * FROM cinema.filmes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    
    // Cabeçalho da tabela (nomes das colunas)
    echo "<tr>";
    // Pega o primeiro registro para extrair os nomes das colunas
    $colunas = array_keys($result->fetch_assoc());
    foreach ($colunas as $col) {
        echo "<th>" . htmlspecialchars($col) . "</th>";
    }
    echo "</tr>";

    // Voltar o ponteiro do resultado para o primeiro registro
    $result->data_seek(0);

    // Exibir os dados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $valor) {
            echo "<td>" . htmlspecialchars($valor) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado.";
}

?>
