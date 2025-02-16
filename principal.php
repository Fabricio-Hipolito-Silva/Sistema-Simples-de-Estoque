
<?php
session_start();
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    header("Location: login.html");
    exit;
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
    <form>
        <input type="text" placeholder="Insira o Nome do Produto">
        <input type="text" placeholder="Insira o Código do Produto">
        <input type="text" placeholder="Insira o Valor do Produto">
        <input type="text" placeholder="Insira a Quantidade do Produto">
        <button type="submit">Cadastrar Produto</button>
    </form>
    <button type="button">Criar Novo Usuário</button>
    <button type="button">Deslogar Sessão</button>
</body>
</html>