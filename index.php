<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página de Busca com MySQL</title>
</head>
<body>
    <header>
        <h1>Home</h1>
        <div id="divBucar">
            <form action="./livroPesquisado.php" method="post">
                <label id="labelBuscar">Buscar Livro</label>
               <input type="text" placeholder="Buscar" name="inputBuscarLivro"> 
            </form>
        </div>
        <div class="buscarLivro">
            <label id='labelBuscarLivro'>Listar Livros</label><br>
            <form id="formBuscarLivro" action="busca.php" method="get">
                <button class="botaoBuscarLivro" name="nome_livro">Clique Aqui</button>
            </form>
        </div>
    </header>

    <!--Cadastro de Livros-->
    <div id='principal'>
        <div id='divCadastroLivro'>  
<!-- Formulário para cadastrar livros -->
<div id='divCadastroLivro'>  
    <form id='formCadastro' action="cadastrar.php" method="post">
        <h2>Cadastrar Livro</h2>
        <div class="divInputCadastro">
            <label class='labelCadastroLivro' for="nomeLivro">Nome do Livro</label>
            <input id="inputNomeLivro" class='inputCadastroLivro' type='text' name="nomeLivro">
        
            <label class='labelCadastroLivro' for="nomeAutor">Nome do Autor</label>
            <input id="nomeAutor" class='inputCadastroLivro' type="text" name="nomeAutor">

            <label class='labelCadastroLivro' for="anoPublicacao">Ano de Publicação</label>
            <input id="anoPublicacao" class='inputCadastroLivro' type="text" name="anoPublicacao">

            <label class='labelCadastroLivro' for="preco">Preço</label>
            <input id="preco" class='inputCadastroLivro' type="text" name="preco">

            <label class='labelCadastroLivro' for="quantidade">Quantidade</label>
            <input id="quantidade" class='inputCadastroLivro' type="text" name="quantidade">

            <label class='labelCadastroLivro' for="tipo">Tipo</label>
            <input id="tipo" class='inputCadastroLivro' type="text" name="tipo">

            <label class='labelCadastroLivro' for="nomeEditora">Nome Editora</label>
            <input id="nomeEditora" class='inputCadastroLivro' type="text" name="nomeEditora">

            <input id="botaoEnviar" type="submit" value="Cadastrar">
        </div>
    </form>
</div>
</div>
</body>
</html>