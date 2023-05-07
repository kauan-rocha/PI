<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["sabor"]) && !empty($_GET["tamanho"]) && !empty($_GET["valor"])){
        $sabor = $_GET["sabor"];
        $tmn = $_GET["tamanho"];
        $vlr = str_replace(",",".",$_GET["valor"]);
    }
    else{
        header("location: ../cadastrarpizza.html");
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "INSERT INTO [TB_PIZ]([DSC_PIZ],[TMN_PIZ],[VLR_PIZ]) VALUES('".$sabor."','".$tmn."',".$vlr.");";

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

    header("location: ../cadastrarpizza.html");

?>