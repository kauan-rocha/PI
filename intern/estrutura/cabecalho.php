<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./conf/format/estiloCabecalho.css">
</head>
<body>
    <div class="cabecalho">
        <div class="divlogo">
            <a href="home.php"> <img src="./conf/imgs/iconpizza.png" alt="Minha Figura"> </a>
            <div style="width:2%;display: inline-block;"></div>
            <h1>Pizzaria foda</h1>
        </div>
        <div class="login">
            <?php  
                if(!empty($_SESSION["sessaoUser"])){
                    echo"<p>Olá, ".$_SESSION["sessaoUser"]."</p><a href='./intern/logout.php' style='color:black;'>Sair</a>";
                }
            ?>
        </div>
    </div>
    <div class="divisor"></div>
    <div id="espaco"></div>
</body>
</html>