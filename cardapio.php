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
        <title>Cardápio</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzaria.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="conteudo">
        <h1>Cardápio</h1>
        <hr/><br>
        <div class="botoes">
            <a href="./intern/formularios/cadastrarpizza.html"><button>Cadastrar Sabor de pizza</button></a>
            <a href="./intern/formularios/edicaopizza.html"><button>Editar Sabor de pizza</button></a>

            <br><br><hr/><br>

            <a href="./intern/formularios/cadastrarbebida.html"><button>Cadastrar bebida</button></a>
            <a href="./intern/formularios/edicaobebida.html"><button>Editar bebida</button></a>
        </div>
    </div>
</body>
</html>