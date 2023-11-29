<?php 

//Incluindo conexão do código
include('conectar.php');

//Atribuindo a variável para p input
$nomePesquisado = $_POST['inputBuscarLivro'];

//Fazendo validação dos campos pesquisados
if (empty($nomePesquisado)) {
    echo '<h2>O campo de pesquisa está em branco</h2>';
} else {
    //Fazendo busca pelo nome digitado no campo
    $nomePesquisado = '%' . $nomePesquisado . '%';

    //Selecionando todos os livros pela variável para nomePesquisado
    $query = "SELECT * FROM acervo WHERE titulo LIKE :nomePesquisado";
    $stmt = $ligacao->prepare($query);
    $stmt->bindParam(':nomePesquisado', $nomePesquisado, PDO::PARAM_STR);
    $stmt->execute();
    $resultadosBusca = $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisado</title>
    <link rel="stylesheet" href="./estilos/livroPesquisado.css">
</head>
<body>
    <header>
        <h2>Resultados Encotrados</h2>
    </header>

    <div class="resultadoBuscaa">
        <?php 
            //Verificando se o resultado está diferente de nulo para fazer aa repetição
            if (!empty($resultadosBusca)) {
                echo '<br><h2 class="result">Livros encontrados com o título:</h2>';
                foreach($resultadosBusca as $resultadosLivro) {
                    echo "ID: " . $resultadosLivro['id'] . ", Título: " . $resultadosLivro['titulo'] . ", Autor: " . $resultadosLivro['autor'] . "<br>";
                }
              //Caso nao seja encontrado nada
            } else {
                echo '<h2 class="result">Nenhum resultado foi encontrado</h2>';
            }
        ?>
    </div>
    
</body>
</html>