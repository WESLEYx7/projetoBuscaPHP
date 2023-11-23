<?php

include("conectar.php");

if (!isset($_GET['nome_livro'])) {
    header("Location: index.php");
    exit;
}

$nome = "%" . trim($_GET['nome_livro']) . "%";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca</title>
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


</body>
</html>
