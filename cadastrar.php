<?php 

//Incluindo conexão
include('conectar.php');

//Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Coleta os dados do que vem através do formulário
    $nomeLivro = $_POST['nomeLivro'];
    $nomeAutor = $_POST['nomeAutor'];
    $anoPublicacao = $_POST['anoPublicacao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $tipo = $_POST['tipo'];
    $nomeEditora = $_POST['nomeEditora'];  

    //Verifique se existe alguma editora
    $queryVerificarEditora = "SELECT id FROM editora WHERE nome = :nomeEditora";
    $stmtVerificarEditora = $ligacao->prepare($queryVerificarEditora);
    $stmtVerificarEditora->bindParam(':nomeEditora', $nomeEditora, PDO::PARAM_STR);
    $stmtVerificarEditora->execute();
    $resultadoVerificarEditora = $stmtVerificarEditora->fetch(PDO::FETCH_ASSOC);

    //Se caso não existe, irá ser inserida
    if (!$resultadoVerificarEditora) {
        $queryInserirEditora = "INSERT INTO editora (nome) VALUES (:nomeEditora)";
        $stmtInserirEditora = $ligacao->prepare($queryInserirEditora);
        $stmtInserirEditora->bindParam(':nomeEditora', $nomeEditora, PDO::PARAM_STR);
        $stmtInserirEditora->execute();

        //Obtem o id da editora inserida
        $idEditora = $ligacao->lastInsertId();
    } else {
        //Obtem o id da editora existente
        $idEditora = $resultadoVerificarEditora['id'];
    }

    //Comando para inserir dados na tabela acervo
    $query = "INSERT INTO acervo (titulo, autor, ano, preco, quantidade, tipo, idEditora) 
              VALUES (:titulo, :autor, :ano, :preco, :quantidade, :tipo, :idEditora)";

    $stmt = $ligacao->prepare($query);
    $stmt->bindParam(':titulo', $nomeLivro, PDO::PARAM_STR);
    $stmt->bindParam(':autor', $nomeAutor, PDO::PARAM_STR);
    $stmt->bindParam(':ano', $anoPublicacao, PDO::PARAM_STR);
    $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->bindParam(':idEditora', $idEditora, PDO::PARAM_INT);

    try {
        //Executa o SQL e volta para o index
        $stmt->execute();
        header("Location: index.php?sucess=true");
        echo "<h2>Enviado com sucesso</h2>";
        exit;
      //Caso dê erro
    } catch(PDOException $e) {
        echo 'Erro: ', $e->getMessage();
    }
}
?>
