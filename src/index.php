<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #121212;
    color: #eee;
    margin: 20px;
    padding: 0;
  }

  h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    font-size: 2.2rem;
    color: #61dafb;
    text-shadow: 0 0 10px #61dafb99;
  }

  ul {
    list-style: none;
    padding: 0;
    max-width: 900px;
    margin: 0 auto;
  }

  li {
    background: #1e1e1e;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgb(97 218 251 / 0.2);
    margin-bottom: 20px;
    padding: 20px;
    display: flex;
    gap: 20px;
    align-items: center;
    transition: background-color 0.3s ease;
  }

  li:hover {
    background-color: #333;
  }

  li img {
    height: 140px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(97, 218, 251, 0.5);
    flex-shrink: 0;
  }

  .movie-info {
    flex: 1;
  }

  .movie-info p {
    margin: 6px 0;
    line-height: 1.4;
    font-size: 0.9rem;
  }

  .movie-info p strong {
    color: #61dafb;
  }

  /* Para melhorar a leitura, quebra as linhas antes do texto da sinopse */
  .movie-info p.synopsis {
    margin-top: 10px;
    font-style: italic;
    color: #aaa;
  }

  @media (max-width: 600px) {
    li {
      flex-direction: column;
      align-items: flex-start;
    }
    li img {
      height: 120px;
      width: 100%;
      object-fit: cover;
      margin-bottom: 15px;
    }
  }
</style>


<?php

require_once('./connection.php');

$sql = "SELECT * FROM filmes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de filmes:</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Sinopse</th>";
    echo "<th>Ano</th>";
    echo "<th>Título Original</th>";
    echo "<th>Idioma Original</th>";
    echo "<th>Orçamento</th>";
    echo "<th>Bilheteria</th>";
    echo "<th>Imagem</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while($row = $result->fetch_assoc()) {

        $id = $row['id'];
        $nome = $row['nome'];
        $sinopse = $row['sinopse'];
        $titulo_original = $row['titulo_original'];
        $idioma_original = $row['idioma_original'];
        $orcamento = $row['orcamento'];
        $bilheteria = $row['bilheteria'];
        $imagem = $row['imagem'];
        $ano_lancamento = $row['ano_lancamento'];


        echo "<tr>";

        echo "<td>$id<br></td>";
        echo "<td>$nome<br></td>";
        echo "<td>$sinopse<br></td>";
        echo "<td>$ano_lancamento<br></td>";
        echo "<td>$titulo_original<br></td>";
        echo "<td>$idioma_original<br></td>";
        echo "<td>$orcamento<br></td>";
        echo "<td>$bilheteria<br></td>";
        echo "<td><img width='100' src='$imagem'><br></td>";

        
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Nenhum filme encontrado.";
}


$conn->close();