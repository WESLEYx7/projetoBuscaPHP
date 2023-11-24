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
        <h1>Modelo</h1>
        <div class="buscarLivro">
            <label id='labelBuscarLivro'>Buscar Livro</label><br>
            <form id="formBuscarLivro" action="busca.php" method="get">
                <button id="nomeLivro" name="nome_livro">Clique Aqui</button>
            </form>
        </div>
    </header>

    <!-- Section para Cadastro de Livros -->
    <div id='principal'>
        <div id='divCadastroLivro'>  
            <form id='formCadastro' action="" method="post">
                <h2>Cadastrar Livro</h2>
                <div class="divInputCadastro">
                    <label class='labelCadastroLivro' for="nomeLivro">Nome do Livro</label>
                    <input id="nomeLivro" class='inputCadastroLivro' type='text'>
                
                    <label class='labelCadastroLivro' for="nomeAutor">Nome do Autor</label>
                    <input id="nomeAutor" class='inputCadastroLivro' type="text">

                    <label class='labelCadastroLivro' for="nomeAutor">Ano de Publicação</label>
                    <input id="anoPublicacao" class='inputCadastroLivro' type="text">

                    <label class='labelCadastroLivro' for="nomeAutor">Preço</label>
                    <input id="preco" class='inputCadastroLivro' type="text">

                    <label class='labelCadastroLivro' for="nomeAutor">Quantidade</label>
                    <input id="quantidade" class='inputCadastroLivro' type="text">

                    <label class='labelCadastroLivro' for="nomeAutor">Tipo</label>
                    <input id="tipo" class='inputCadastroLivro' type="text">

                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>