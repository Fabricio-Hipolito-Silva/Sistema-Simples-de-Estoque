<?php
require "conecta.php";
session_start();
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM `usuarios` WHERE `usuario` = :usuario AND `senha` = :senha";
$validar = $conn->prepare($sql);
$validar->bindParam(':usuario', $usuario);
$validar->bindParam(':senha', $senha);
$validar->execute();

    if ($validar->rowCount() > 0) {
        $_SESSION['usuario_autenticado'] = true;  
        header("Location: principal.php");
        exit;
    }else {
        echo "<script>alert('Usuário ou Senha Inválidos'); window.location.href='login.html';</script>";
    };

