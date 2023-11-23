<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página de Busca com MySql</title>
</head>
<body>
    <header>
        <h1>Modelo</h1>
        <form action="">
            <label id='labelBuscarLivro' for="">Buscar Livro</label>
            <input type="text">
        </form>
    </header>

    <!-- Section para Cadastro de Livros -->
    <section id='principal'>
        <div id='divCadastroLivro'>  
            <form id='formCadastro' action="">
                <h2>Cadastrar Livro</h2>
                    <div class="divInputCadastro">
                        <label class='labelCadastroLivro' for="">Nome do Livro</label>
                        <input class='inputCadastroLivro' name="nome_livro" type='text'>
                
                        <label class='labelCadastroLivro' for="">Nome do Autor</label>
                        <input class='inputCadastroLivro' type="text">
                    </div>
            </form>
        </div>
    </section>

</body>
</html>