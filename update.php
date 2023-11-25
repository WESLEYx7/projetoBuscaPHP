<?php

include("conectar.php");

// Verifique se o ID foi passado como parâmetro
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Obtém o ID do livro a ser atualizado
$idLivro = $_GET['id'];

// Comando para selecionar os dados do livro com base no ID
$query = "SELECT * FROM acervo WHERE id = :id";
$stmt = $ligacao->prepare($query);
$stmt->bindParam(':id', $idLivro, PDO::PARAM_INT);
$stmt->execute();
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o livro foi encontrado
if (!$livro) {
    echo "Livro não encontrado.";
    exit;
}

//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $novoTitulo = $_POST['novoTitulo'];
    $novoAutor = $_POST['novoAutor'];
    $novoAno = $_POST['novoAno'];
    $novoPreco = $_POST['novoPreco'];
    $novaQuantidade = $_POST['novaQuantidade'];
    $novoTipo = $_POST['novoTipo'];

    //
    $queryAtualizacao = "UPDATE acervo SET titulo = :titulo, autor = :autor, ano = :ano, preco = :preco, quantidade = :quantidade, tipo = :tipo WHERE id = :id";
    $stmtAtualizacao = $ligacao->prepare($queryAtualizacao);
    $stmtAtualizacao->bindParam(':titulo', $novoTitulo, PDO::PARAM_STR);
    $stmtAtualizacao->bindParam(':autor', $novoAutor, PDO::PARAM_STR);
    $stmtAtualizacao->bindParam(':ano', $novoAno, PDO::PARAM_STR);
    $stmtAtualizacao->bindParam(':preco', $novoPreco, PDO::PARAM_STR);
    $stmtAtualizacao->bindParam(':quantidade', $novaQuantidade, PDO::PARAM_INT);
    $stmtAtualizacao->bindParam(':tipo', $novoTipo, PDO::PARAM_STR);
    $stmtAtualizacao->bindParam(':id', $idLivro, PDO::PARAM_INT);
    $stmtAtualizacao->execute();

    // Redireciona de volta para a página de resultados da busca
    header("Location: resultados.php?nome_livro=" . urlencode($_GET['nome_livro']));
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link rel="stylesheet" href="styleBusca.css">
</head>
<body>

    <h2>Atualizar Livro</h2>

    <form action="./busca.php" method="post">
        <label for="novoTitulo">Novo Título:</label>
        <input type="text" id="novoTitulo" name="novoTitulo" value="<?= $livro['titulo']; ?>" required>

        <label for="novoAutor">Novo Autor:</label>
        <input type="text" id="novoAutor" name="novoAutor" value="<?= $livro['autor']; ?>" required>

        <label for="novoAno">Novo Ano:</label>
        <input type="text" id="novoAno" name="novoAno" value="<?= $livro['ano']; ?>" required>

        <label for="novoPreco">Novo Preço:</label>
        <input type="text" id="novoPreco" name="novoPreco" value="<?= $livro['preco']; ?>" required>

        <label for="novaQuantidade">Nova Quantidade:</label>
        <input type="text" id="novaQuantidade" name="novaQuantidade" value="<?= $livro['quantidade']; ?>" required>

        <label for="novoTipo">Novo Tipo:</label>
        <input type="text" id="novoTipo" name="novoTipo" value="<?= $livro['tipo']; ?>" required>

        <button type="submit">Atualizar</button>
    </form>

</body>
</html>
