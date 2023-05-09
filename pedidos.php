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
        <title>Pedidos</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzaria.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="conteudo">
        <h1>Pedidos</h1>

        <hr/>

        <?php include("./intern/controlepedido.php") ?>

        <hr/>
    </div>

    <?php
        if(!empty($_GET["resp"])){
            if($_GET["resp"] == "editsuss")
                echo "<div id='msg-box' style='background-color: darkseagreen;'><p>Pedido atualizado com sucesso!!</p></div>";
            elseif($_GET["resp"] == "erroinfo")
                echo "<div id='msg-box' style='background-color: #EC7063;'><p>Erro na atualização! Tente novamente mais tarde.</p></div>";
        }
    ?>

    <script src="js/controlepedido.js"></script>
</body>
</html>