<?php
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


