<?php
require "conecta.php";
$codigo = $_POST['codigo'];


$sql = "DELETE FROM `estoque` WHERE `cd_produto` = :codigo";
$excluir = $conn->prepare($sql);
$excluir->bindParam(':codigo', $codigo);

try {
    $excluir->execute();
    echo "Exclui com Sucesso";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}


