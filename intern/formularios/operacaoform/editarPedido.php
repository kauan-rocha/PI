<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["cod"]) && !empty($_GET["acao"])){
        $cod = $_GET["cod"];
        $acao = $_GET["acao"];
    }
    else{
        header("location: /pizz/pedidos.php?resp=erroinfo");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $acao = ($acao == 'fin' ? "F" : "C");

        $queryString = "UPDATE [TB_PED] SET [STS_PED] = '".$acao."' WHERE [CD_PED] = ".$cod.";";

        var_dump($queryString);

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

    header("location: /pizz/pedidos.php?resp=editsuss");
    die;

?>