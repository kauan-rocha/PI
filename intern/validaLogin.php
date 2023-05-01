<?php
    include_once(realpath(__DIR__."/../conf/default.php"));
    include_once(realpath(__DIR__."/../conf/conexaoBd.php"));

    $cpf="";
    $senha="";

    if(!empty($_POST["cpf"]) && !empty($_POST["senha"])){
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];

        //71171200889
        //apenha
        
    }else{
        header("Location: ./../login.php?loginFail=true");
        die;
    }

    try{
        $Conexao = Conexao::getConnection();

        $queryString = "SELECT fun.NM_FUN, fun.CD_GRP_FUN FROM TB_AUT aut INNER JOIN TB_FUN fun ON aut.CPF_FUN = fun.CPF_FUN ";
        $queryString = $queryString."WHERE aut.CPF_FUN='".$cpf."' AND aut.SEN_AUT='".$senha."';";
        
        $query = $Conexao->query($queryString);
        $user = $query->fetchAll();

        //var_dump($user);
        //die;

        if($query->rowCount() != 1){
            header("Location: ./../login.php?loginFail=true");
            die;
        }else{
            $_SESSION["sessaoUser"] = $user[0]['NM_FUN'];
            $_SESSION["sessaoPerfil"] = $user[0]['CD_GRP_FUN'];

            header("location: ./../home.php");
            die;
        }
    }catch(Exception $e){
    
        echo $e->getMessage();
        exit;
    
    }
?>