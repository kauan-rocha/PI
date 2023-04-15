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
        <title>Home</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzaria.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="wallpaper">
        <img src="./conf/imgs/pizzawallpaper.jpg" alt="Minha Figura">
    </div>
</body>
</html>