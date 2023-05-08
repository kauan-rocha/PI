<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["codigo"]) && !empty($_GET["descricao"]) && !empty($_GET["valor"])){
        $cod = $_GET["codigo"];
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
            $queryString = "UPDATE [TB_BEB] SET [DSC_BEB] = '".$desc."', [VLR_BEB] = ".$vlr.", [CD_MAR] = ".$marca." WHERE [CD_BEB] = ".$cod.";";
        }else{
            $queryString = "UPDATE [TB_BEB] SET [DSC_BEB] = '".$desc."', [VLR_BEB] = ".$vlr." WHERE [CD_BEB] = ".$cod.";";
        }

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'ATUALIZADO!!';
        }else{
            echo 'ESTRANHO!!';
        }
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }

    header("location: ../edicaobebida.html");
    die;
?>