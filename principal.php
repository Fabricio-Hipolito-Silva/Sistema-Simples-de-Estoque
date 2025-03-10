
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
    <script src="jquery.js"></script>
    <script>

    window.onload = reload();

    function reload() {
        $.ajax({
            url: "array.php",
            type: "POST",
            data: { acao: "verificar" },
         dataType: "html"
 }).done(function(resp) {
    $("#conteudo").html(resp); 
    }).fail(function(jqXHR, textStatus) {
    alert("Falha na requisição AJAX: " + textStatus);
    }).always(function() {
    console.log("Requisição AJAX registro concluída");
    });
}
    $(document).ready(function(){    
    $("#enviar").click(function(){
        var nome = $("#nome").val();
        var codigo = $("#codigo").val();
        var valor = $("#valor").val();
        var quantidade = $("#quantidade").val();
        $.ajax({
            url: "principaladd.php",
            type: "POST",
            data: { nome: nome, codigo: codigo, valor: valor, quantidade: quantidade}, 
            dataType: "html"
        }).done(function(resp) {
            $("#conteudo").append(`<div> Nome: ${nome} | Código: ${codigo} | Valor: ${valor} | Quantidade ${quantidade} <button data-codigo="${codigo}" id="excluir">Excluir Item</button> <button type="button"> Alterar </button> </div>`);
            console.log(resp);
        }).fail(function(jqXHR, textStatus) {
            alert("Falha na requisição AJAX: " + textStatus);
        }).always(function() {
            console.log("Requisição AJAX concluída");
            $("#nome, #codigo, #valor, #quantidade").val("");
        });
    });

    $("#conteudo").on("click", "#excluir", function(){
        var codigo = $(this).data('codigo'); //ESSE ATRIBUTO É MUITO ZIKA VIADO
        var div = this.closest("div")
        $.ajax({
            url: "deleta.php",
            type: "POST",
            data: { codigo: codigo}, 
            dataType: "html"
        }).done(function(resp) {
            console.log("Excluido com Sucesso")
        }).fail(function(jqXHR, textStatus) {
            alert("Falha na requisição AJAX: " + textStatus);
        }).always(function() {
        });
        div.innerHTML = ""
    });

  

        document.getElementById("deslogar").addEventListener("click", function () {
            window.location.href="desloga.php"
        })
    });





    </script>
</head>
<body>
    <form action="principaladd.php" method="post">
        <input id="nome" type="text" name="nome" placeholder="Insira o Nome do Produto">
        <input id="codigo" type="text" name="codigo" placeholder="Insira o Código do Produto">
        <input id="valor" type="text" name="valor" placeholder="Insira o Valor do Produto">
        <input id="quantidade" type="text" name="quantidade" placeholder="Insira a Quantidade do Produto">
        <button id="enviar" type="button">Cadastrar Produto</button>
    </form>
    <button id="deslogar" type="button">Deslogar Sessão</button>
    <div id="conteudo"></div>

</body>
</html>