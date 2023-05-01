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
            <hr/>

            <?php
                switch ($formulario) {
                    case "addfunc":
                        include("./intern/formularios/cadastrarfuncionario.html");
                        break;
                    default:
                        echo "
                            <button><a href='?form=addfunc'>Adicionar funcionário</a></button>
                        ";
                        break;
                }
            ?>

    </div>

</body>
</html>