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

// Se o formulário for enviado (postado), atualize os dados no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $novoTitulo = $_POST['novoTitulo'];
    $novoAutor = $_POST['novoAutor'];
    $novoAno = $_POST['novoAno'];
    $novoPreco = $_POST['novoPreco'];
    $novaQuantidade = $_POST['novaQuantidade'];
    $novoTipo = $_POST['novoTipo'];
    $novoNomeEditora = $_POST['novoNomeEditora'];

    // Comando SQL para atualizar os dados do livro
    $queryAtualizacao = "UPDATE acervo SET titulo = ?, autor = ?, ano = ?, preco = ?, quantidade = ?, tipo = ? WHERE id = ?";
    $stmtAtualizacao = $ligacao->prepare($queryAtualizacao);
    $stmtAtualizacao->execute([$novoTitulo, $novoAutor, $novoAno, $novoPreco, $novaQuantidade, $novoTipo, $idLivro]);


    // Redireciona de volta para a página de resultados da busca
    header("Location: busca.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link rel="stylesheet" href="./estilos/styleUpdate.css">
</head>
<body>

    <header>
        <h2>Update Livros</h2>
    </header>

    <form action="./update.php?id=<?= $idLivro ?>" method="post">
        <label for="novoTitulo">Novo Título:</label>
        <input type="text" name="novoTitulo" value="<?= $livro['titulo']; ?>" required>

        <label for="novoAutor">Novo Autor:</label>
        <input type="text" name="novoAutor" value="<?= $livro['autor']; ?>" required>

        <label for="novoAno">Novo Ano:</label>
        <input type="text" name="novoAno" value="<?= $livro['ano']; ?>" required>

        <label for="novoPreco">Novo Preço:</label>
        <input type="text" name="novoPreco" value="<?= $livro['preco']; ?>" required>

        <label for="novaQuantidade">Nova Quantidade:</label>
        <input type="text" name="novaQuantidade" value="<?= $livro['quantidade']; ?>" required>

        <label for="novoTipo">Novo Tipo:</label>
        <input type="text" name="novoTipo" value="<?= $livro['tipo']; ?>" required>

        <button id="botaoAtualizar" type="submit">Atualizar</button>
    </form>

</body>
</html>