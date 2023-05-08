<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["descricao"]) && !empty($_GET["valor"])){
        $desc = $_GET["descricao"];
        $marca = $_GET["marca"];
        $vlr = str_replace(",",".",$_GET["valor"]);
    }
    else{
        header("location: ../cadastrarbebida.html");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        if(!empty($marca)){
            $queryString = "INSERT INTO [TB_BEB]([DSC_BEB],[VLR_BEB],[CD_MAR]) VALUES('".$desc."',".$vlr.",".$marca.");";
        }else{
            $queryString = "INSERT INTO [TB_BEB]([DSC_BEB],[VLR_BEB],[CD_MAR]) VALUES('".$desc."',".$vlr.",NULL);";
        }

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

    header("location: ../cadastrarbebida.html");
    die;

?>