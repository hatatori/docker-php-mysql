<?php

class Connection{

    public $db_host = "mysql";    
    public $db_user = "root";
    public $db_password = "1234";
    public $db_name = "cinema";

    public $conn;

    public function __construct($db_host, $db_user, $db_password, $db_name=''){
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        $this->conn;
        $this->connect();
    }

    public function file($local){
        $arquivo = $local;
        if (!file_exists($arquivo)) {
            throw new Exception("Arquivo não encontrado.");
        }
        $sql = file_get_contents($arquivo);
        $queries = explode(';', $sql);
        foreach ($queries as $query) {
            $query = trim($query);
            if ($query) {
                if (!$this->conn->query($query)) {
                    throw new Exception("Erro na query: " . $conn->error);
                }
            }
        }
        echo "Arquivo SQL executado com sucesso!";
    }

    public function connect(){
        if($this->db_name == ''){
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password);
        }else{
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password);
            $this->conn->query("CREATE DATABASE IF NOT EXISTS $this->db_name");
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        }
        $this->conn->set_charset("utf8");
    }

    public function getConnection(){
        return $this->conn;
    }

    public function table_db($table_name){
        $sql = "SELECT * FROM $table_name";
        $resultado = $this->conn->query($sql);
        if ($resultado->num_rows > 0) {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            $cabecalho_impresso = false;
            while ($linha = $resultado->fetch_assoc()) {
                if (!$cabecalho_impresso) {
                    echo "<tr>";
                    foreach ($linha as $coluna => $valor) {
                        echo "<th>$coluna</th>";
                    }
                    echo "</tr>";
                    $cabecalho_impresso = true;
                }

                echo "<tr>";
                foreach ($linha as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum dado encontrado.";
        }
    }

    public function table($query){
        $sql = $query;
        $resultado = $this->conn->query($sql);
        if ($resultado->num_rows > 0) {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            $cabecalho_impresso = false;
            while ($linha = $resultado->fetch_assoc()) {
                if (!$cabecalho_impresso) {
                    echo "<tr>";
                    foreach ($linha as $coluna => $valor) {
                        echo "<th>$coluna</th>";
                    }
                    echo "</tr>";
                    $cabecalho_impresso = true;
                }

                echo "<tr>";
                foreach ($linha as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum dado encontrado.";
        }
    }
}

$db_host = "mysql";    
$db_user = "root";
$db_password = "1234";
$db_name = "cinema";

$conn = new Connection($db_host, $db_user, $db_password, $db_name);

// $conn->file('./data.sql');
// $conn->table_db('filmes');
// $conn->table('SELECT * FROM filmes');
// $result = $conn->table("SELECT * FROM filmes LIMIT 3");


