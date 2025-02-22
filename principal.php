
<?php
session_start();
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: login.html");
    exit;
}


require "conecta.php";
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];


$sql = "INSERT INTO `estoque`(`nm_produto`, `cd_produto`, `vl_preco`, `qt_produto`) VALUES (:nome,:codigo,:valor,:quantidade)";
$inserir = $conn->prepare($sql);
$inserir->bindParam(':nome', $nome);
$inserir->bindParam(':codigo', $codigo);
$inserir->bindParam(':valor', $valor);
$inserir->bindParam(':quantidade', $quantidade);

try {
    $inserir->execute();
    echo "Inserido com Sucesso";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <form action="principaladd.php" method="post">
        <input type="text" name="nome" placeholder="Insira o Nome do Produto">
        <input type="text" name="codigo" placeholder="Insira o Código do Produto">
        <input type="text" name="valor" placeholder="Insira o Valor do Produto">
        <input type="text" name="quantidade" placeholder="Insira a Quantidade do Produto">
        <button type="submit">Cadastrar Produto</button>
    </form>
    <button type="button">Criar Novo Usuário</button>
    <button type="button">Deslogar Sessão</button>
</body>
</html>