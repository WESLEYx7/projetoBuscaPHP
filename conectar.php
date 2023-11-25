<?php

// Dados de acesso
$host = "127.0.0.1";
$dbn  = "aprendendo_php";
$user = "root";
$pass = "";

try {
    $ligacao = new PDO("mysql:dbname=$dbn;host=$host", $user, $pass);
    echo "Conexão com o banco de dados " . $dbn . " com sucesso";
} catch (PDOException $e) {
    echo "Erro de conexão " . $e->getMessage();
    exit;
}

$queryEditora = $ligacao->prepare("SELECT * FROM editora");
$queryEditora->execute();
$resultadosEditora = $queryEditora->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultadosEditora);

// Preparar e executar a consulta
$query = $ligacao->prepare("SELECT * FROM acervo");
$query->execute();

// Obter os resultados
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

// Exibir os resultados (apenas para fins de teste)
//print_r($resultados);

?>
