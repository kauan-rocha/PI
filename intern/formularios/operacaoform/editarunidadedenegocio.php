<?php

    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["cnpj"]) && !empty($_GET["nome"])){
        $cnpj = $_GET["cnpj"];
        $nome = $_GET["nome"];
    }
    else{
        header("location: ../unidadedenegocio.html");
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "
            UPDATE [TB_UND_NGC]
            SET 
            [CNPJ_UND_NGC] = '".$cnpj."',
            [RAZ_SCL_UND_NGC] = '".$nome."'
            WHERE [CD_UND_NGC] = 1;
        ";

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

    header("location: ../unidadedenegocio.html");

?>