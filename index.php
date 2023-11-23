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
        <form action="busca.php" method="get">
            <label id='labelBuscarLivro' for="nome_livro">Buscar Livro</label>
            <input id="nome_livro" name="nome_livro" type="text">
        </form>
    </header>

    <!-- Section para Cadastro de Livros -->
    <section id='principal'>
        <div id='divCadastroLivro'>  
            <form id='formCadastro' action="" method="post">
                <h2>Cadastrar Livro</h2>
                <div class="divInputCadastro">
                    <label class='labelCadastroLivro' for="nomeLivro">Nome do Livro</label>
                    <input id="nomeLivro" class='inputCadastroLivro' type='text'>
                
                    <label class='labelCadastroLivro' for="nomeAutor">Nome do Autor</label>
                    <input id="nomeAutor" class='inputCadastroLivro' type="text">
                </div>
            </form>
        </div>
    </section>
</body>
</html>