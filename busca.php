<?php 

if(!isset($_GET['nome_livro'])) {
    header("Location: index.php");
}

$nome = "%" .trim($_GET['nome_livro'])."%";

$dbh = new PDO('mysql:host=127.0.0.1;dbname=bancolivros', 'root', '');

$sth = $dbh->prepare('SELECT * FROM `livros` WHERE `nome` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute(); // Executar a consulta

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Resultado da Busca</h2>

    <?php
        if (count($resultados)) {
            foreach($resultados as $Resultado) {
?>                
            <label><?php echo $Resultado['id']; ?> - <?php echo $Resultado['nome']; ?></label>
            <br>
            <?php
            }} else {
            ?>
            <label>Não foram encontrados resultados pelo termo buscado.</label>
            <?php
            }
    ?>
</body>
</html>
