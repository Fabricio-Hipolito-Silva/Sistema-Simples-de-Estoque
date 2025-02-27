<?php
require "conecta.php";

$sql = "SELECT * FROM `estoque`";
$verificar = $conn->prepare($sql);
$verificar->execute();
$resultado = $verificar->fetchAll(PDO::FETCH_ASSOC); // Obtém os resultados da query

foreach ($resultado as $row) {
    echo "<div> 
            Nome: " . $row["nm_produto"] . " | 
            Código: " . $row["cd_produto"] . " | 
            Valor: " . $row["vl_preco"] . " | 
            Quantidade: " . $row["qt_produto"] . "
            <button data-codigo='" . $row["cd_produto"] . "' id='excluir'>Excluir Item</button>
            <button type='button'>Alterar</button>
        </div>";
}

