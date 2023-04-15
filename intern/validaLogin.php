<?php
    include_once(realpath(__DIR__."/../conf/default.php"));
    //include_once(realpath(__DIR__."/../conf/conexaoBd.php"));

    $cpf="";
    $senha="";

    if(!empty($_POST["cpf"]) && !empty($_POST["senha"])){
        //$cpf = $_POST["cpf"];
        //$senha = $_POST["senha"];

        $_SESSION["sessaoUser"] = "Kauan Santos Rocha";
        $_SESSION["sessaoPerfil"] = 0;

        echo "<script>console.log(".$_SESSION["sessaoUser"].")<script>";

        header("location: ./../home.php");
        die;

    }else{
        header("Location: ./../login.php?loginFail=true");
        die;
    }

    /*
    $link = OpenConnectBd();

    $sql = "SELECT nome FROM usuarios WHERE cpf='$cpf' and senha='$senha';"; 
    $query = mysqli_query($link, $sql);

    try{
        while($result = mysqli_fetch_array($query)) {
            $arrayResul[]=$result;
        }
    }catch (exception $e) {
        header("Location: ./../login.php?loginFail=true");
        die;
    }
    if(mysqli_num_rows($query) != 1){
        header("Location: ./../login.php?loginFail=true");
        die;
    }else{
        $_SESSION["sessaoUser"] = $arrayResul[0]["nome"];
        header("location: ./../home.php?");
        die;
    }
    */
?>