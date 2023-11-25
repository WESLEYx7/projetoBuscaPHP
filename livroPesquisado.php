<?php 

include('conectar.php');

if(empty($_POST['inputBuscarLivro'])) {
    echo '<br><h2>O campo buscar está esta em branco</h2>';
}

$nomePesquisado = $_POST['inputBuscarLivro'];

$query = "SELECT * FROM acervo WHERE titulo LIKE :nomePesquisado";
$stmt = $ligacao->prepare($query);
$stmt->bindParam(':nomePesquisado', '%' . $nomePesquisado . '%', PDO::PARAM_STR);
$stmt->execute();
$resultadosBusca = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!$resultadosBusca) {
    echo '<h2>Nenhum resultado foi encontrado</h2>';
} else {
    echo '<br><h2>Livros encontrados com o titulo foi: ' . $resultadosBusca . ' !</h2>';
}

foreach($resultadosBusca as $buscado) {
    echo "ID: " . $livro['id'] . ", Título: " . $livro['titulo'] . ", Autor: " . $livro['autor'] . "<br>";
}

?>