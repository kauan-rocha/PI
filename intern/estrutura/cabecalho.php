<?php
    include_once(realpath(__DIR__."/../../conf/default.php"));
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/pizz/conf/format/estiloCabecalho.css">
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cabecalho">
        <div class="divlogo">
            <a href="home.php"> <img src="/pizz/conf/imgs/images-removebg-preview.png" alt="Minha Figura"> </a>
            <div style="width:2%;display: inline-block;"></div>
            <h1><?php echo $_SESSION["nomePizzaria"]; ?></h1>
        </div>
        <div class="login">
            <?php  
                if(!empty($_SESSION["sessaoUser"])){
                    echo"<p>Olá, ".$_SESSION["sessaoUser"]."</p><a href='/pizz/intern/logout.php' style='color:black;'>Sair</a>";
                }
            ?>
        </div>
    </div>
    <div class="divisor"></div>
    <div id="espaco"></div>
</body>
</html>