<?php

include("conectar.php");

if (!isset($_GET['nome_livro'])) {
    header("Location: index.php");
    exit;
}

$nome = "%" . trim($_GET['nome_livro']) . "%";

// Comando para selecionar todos os dados da tabela
$query = "SELECT * FROM acervo WHERE titulo LIKE :nome";

// Statements para evitar SQL Injection
$stmt = $ligacao->prepare($query);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca</title>
    <style>
        td {
            padding: 15pt;
            border: solid 2pt;
        }
    </style>
</head>
<body>
    <h2>Resultado da Busca</h2>

    <table>
        <tr>
            <td>Código</td>
            <td>Título</td>
            <td>Autor</td>
            <td>Ano</td>
            <td>Preço</td>
            <td>Quantidade</td>
            <td>Tipo</td>
        </tr>

        <?php foreach ($resultados as $livro): ?>
            <tr>
                <td><?= $livro['id']; ?></td>
                <td><?= $livro['titulo']; ?></td>
                <td><?= $livro['autor']; ?></td>
                <td><?= $livro['ano']; ?></td>
                <td><?= $livro['preco']; ?></td>
                <td><?= $livro['quantidade']; ?></td>
                <td><?= $livro['tipo']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
