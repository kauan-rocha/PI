<?php
    include_once(realpath(__DIR__."./conf/default.php"));
    if(!empty($_SESSION["sessaoUser"])){
        header("location: home.php?");
        die;
    }
    if(!empty($_GET["loginFail"])){
        $erro = true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzaLogin.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
    <script>
        function hideFailLogin() {
            var objeto = document.getElementById("erroLogin").style.display = "none";
        }
    </script>
<body>
    <div class="loginPai">
        <div class="loginForm">
            <a href='./'><img src="./conf/imgs/iconpizza.png" alt="Minha Figura"></a>

            <div id="erroLogin" onclick='hideFailLogin()' class="erroLogin" style="<?php if($erro){echo "display: inline-block;";} ?> " ><p>Usuário não encontrado!</p></div>

            <form action="./intern/validaLogin.php" method="post">
                <div class="divform">
                    <label for="fname">CPF:</label><br>
                    <input type="text" name="cpf" placeholder="000.000.000-00"><br>
                </div>
                <div>  
                    <label for="lname">Senha:</label><br>
                    <input type="password" name="senha"><br><br>
                    <input type="submit" value="Entrar">
                </div>
            </form> 
        </div>
    </div>
</body>
</html>