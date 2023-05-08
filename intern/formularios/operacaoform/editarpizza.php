<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["codigo"]) && !empty($_GET["sabor"]) && !empty($_GET["tamanho"]) && !empty($_GET["valor"])){
        $cod = $_GET["codigo"];
        $sabor = $_GET["sabor"];
        $tmn = $_GET["tamanho"];
        $vlr = str_replace(",",".",$_GET["valor"]);
    }
    else{
        header("location: ../edicaopizza.html");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "UPDATE [TB_PIZ] SET [DSC_PIZ] = '".$sabor."', [TMN_PIZ] = '".$tmn."', [VLR_PIZ] = ".$vlr." WHERE [CD_PIZ] = ".$cod.";";

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

    header("location: ../edicaopizza.html");
    die;

?>