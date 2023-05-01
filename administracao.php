<?php
    include_once(realpath(__DIR__."/conf/default.php"));
    if(empty($_SESSION["sessaoUser"])){
        header("location: login.php");
        console.log($_SESSION["sessaoUser"]);
        die;
    }

    $formulario = (empty($_GET["form"]) ? "" : $_GET["form"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administração</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzaria.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class='conteudo'>
            <h1>Administração</h1>
            <hr/><br>
            <div class="botoes">
                <a href="./intern/formularios/cadastrarfuncionario.html"><button>Cadastrar funcionário</button></a>
                <a href="./intern/formularios/edicaofuncionario.html"><button>Editar funcionário</button></a>

                <br><br><hr/><br>

                <a href="./intern/formularios/cadastrogrupofuncional.html"><button>Cadastrar grupo funcional</button></a>

                <br><br><hr/><br>

                <a href="./intern/formularios/unidadedenegocio.html"><button>Editar unidade de negócio</button></a>
            </div>
    </div>
</body>
</html>