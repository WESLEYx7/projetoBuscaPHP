<?php

include("conectar.php");

if (!isset($_GET['nome_livro'])) {
    header("Location: index.php");
    exit;
}


$nome = "%" . trim($_GET['nome_livro']) . "%";

// Comando para selecionar todos os dados da tabela
$query = "SELECT * FROM acervo WHERE titulo LIKE :nome";
$queryEditora = "SELECT * FROM editora WHERE nome LIKE :nome";

// Statements para evitar SQL Injection
$stmt = $ligacao->prepare($query);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


try {
    //Contra SQL injection
    $stmt = $ligacao->prepare($queryEditora);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();
    $resultadoEditora = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca</title>
    <link rel="stylesheet" href="styleBusca.css">
    
</head>
<body>

        <?php foreach ($resultadosEditora as $editora) {
        echo "ID: " . $editora['id'] . ", Nome: " . $editora['nome'] . "<br>";
        }?>

    <h2>Resultado da Busca</h2>

    <div class="tabela-container">
        <table class="tabelaAcervo">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Tipo</th>
                    <th>Alterar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $livro): ?>
                    <tr>
                        <td><?= $livro['id']; ?></td>
                        <td><?= $livro['titulo']; ?></td>
                        <td><?= $livro['autor']; ?></td>
                        <td><?= $livro['ano']; ?></td>
                        <td><?= $livro['preco']; ?></td>
                        <td><?= $livro['quantidade']; ?></td>
                        <td><?= $livro['tipo']; ?></td>
                        <td><a href="./update.php">Alterar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="tabelaEditora">
            <thead>
                <tr>
                    <th>Código editora</th>
                    <th>Nome da editora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultadoEditora as $editora): ?>
                    <tr>
                        <td><?= $editora['id']; ?></td>
                        <td><?= $editora['nome']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>