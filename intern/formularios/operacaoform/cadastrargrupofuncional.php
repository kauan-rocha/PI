<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["cod"]) && !empty($_GET["grupo"])){
        $cod = $_GET["cod"];
        $grupo = $_GET["grupo"];
    }
    else{
        header("location: ../cadastrogrupofuncional.html");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "INSERT INTO [TB_GRP_FUN] ([DT_CAD_GRP_FUN],[CD_GRP_FUN],[NM_GRP_FUN]) VALUES(CONVERT(date, GETDATE()),'".$cod."','".$grupo."');";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'INSERIDO!!';
        }else{
            echo 'ESTRANHO!!';
        }
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }

    header("location: ../cadastrogrupofuncional.html");
    die;

?>