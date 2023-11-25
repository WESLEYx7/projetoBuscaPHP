<?php 

include('conectar.php');

$nomePesquisado = $_POST['inputBuscarLivro'];

if (empty($nomePesquisado)) {
    echo '<h2>O campo de pesquisa está em branco</h2>';
} else {
    $nomePesquisado = '%' . $nomePesquisado . '%';

    $query = "SELECT * FROM acervo WHERE titulo LIKE :nomePesquisado";
    $stmt = $ligacao->prepare($query);
    $stmt->bindParam(':nomePesquisado', $nomePesquisado, PDO::PARAM_STR);
    $stmt->execute();
    $resultadosBusca = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultadosBusca)) {
        echo '<h2>Nenhum resultado foi encontrado</h2>';
    } else {
        echo '<br><h2>Livros encontrados com o título:</h2>';
        foreach($resultadosBusca as $resultadosLivro) {
            echo "ID: " . $resultadosLivro['id'] . ", Título: " . $resultadosLivro['titulo'] . ", Autor: " . $resultadosLivro['autor'] . "<br>";
        }
    }
}

?>
