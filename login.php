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
<body style="height:100vh; background-image: url('./conf/imgs/hora-da-pizza-saborosa-pizza-caseira-tradicional-receita-italiana.jpg'); background-size: 100vw 100vh;">
    <div class="loginPai">
        <div class="loginForm">
            <a href='./'><img src="./conf/imgs/images-removebg-preview.png" alt="Minha Figura"></a>

            <div id="erroLogin" onclick='hideFailLogin()' class="erroLogin" style="<?php if($erro){echo "display: inline-block;";} ?> " ><p>Usuário não encontrado!</p></div>

            <form action="./intern/validaLogin.php" method="post">
                <div class="divform">
                    <label for="fname">CPF:</label><br>
                    <input type="text" maxlength="11" name="cpf" placeholder="Apenas números"><br>
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