<?php
    include_once(realpath(__DIR__."/conf/default.php"));
    if(empty($_SESSION["sessaoUser"])){
        header("location: login.php");
        console.log($_SESSION["sessaoUser"]);
        die;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pedido</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzariaCadPedido.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="pedido">
        <div class="resumo">
        </div>

        <div class="infos">
        </div>

        <div class="venda">
        </div>
    </div>
</body>
</html>