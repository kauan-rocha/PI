<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["nome"]) && !empty($_GET["cpf"]) && !empty($_GET["senha"]) && !empty($_GET["grupofuncional"])){
        $nome = $_GET["nome"];
        $cpf = $_GET["cpf"];
        $senha = $_GET["senha"];
        $grupofuncional = $_GET["grupofuncional"];
    }
    else{
        header("location: ../editaofuncionario.html");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "
            UPDATE [TB_FUN]
            SET 
            [NM_FUN] = '".$nome."',
            [CD_GRP_FUN] = '".$grupofuncional."'
            WHERE [CPF_FUN] = '".$cpf."';
        ";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'INSERIDO!!';

            $queryString = "
                UPDATE [TB_AUT] SET
                [SEN_AUT] = '".$senha."'
                WHERE [CPF_FUN] = '".$cpf."';
            ";

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

    header("location: ../editaofuncionario.html");
    die;
?>