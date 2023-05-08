<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["nome"]) && !empty($_GET["cpf"]) && !empty($_GET["senha"]) && !empty($_GET["grupofuncional"])){
        $nome = $_GET["nome"];
        $cpf = $_GET["cpf"];
        $senha = $_GET["senha"];
        $grupofuncional = $_GET["grupofuncional"];
    }
    else{
        header("location: ../cadastrarfuncionario.html");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "INSERT INTO [TB_FUN]([CPF_FUN],[NM_FUN],[STS_CAD_FUN],[DT_CAD_FUN],[CD_GRP_FUN]) VALUES";
        $queryString = $queryString."('".$cpf."', '".$nome."', 'A', CONVERT(date, GETDATE()), '".$grupofuncional."');";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'INSERIDO!!';

            $queryString = "INSERT INTO [TB_AUT]([LGN_AUT],[SEN_AUT],[CPF_FUN]) VALUES ('".substr($cpf, 0, -1)."', '".$senha."', '".$cpf."');";

            $queryAuth = $Conexao->query($queryString);

            if($queryAuth->rowCount() == 1){
                echo 'INSERIDO LOGIN!!';
            }else{
                echo 'MUUUITO ESTRANHO, BRO!!';
            }

        }else{
            echo 'ESTRANHO!!';
        }



    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }

    header("location: ../cadastrarfuncionario.html");
    die;

?>