<?php
    include_once("../../../conf/conexaoBd.php");

    $pesquisa = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

    $retorno;
    
    if(!empty($pesquisa)){
        try{
            $Conexao = Conexao::getConnection();
    
            $queryString = "SELECT DISTINCT TOP 6 [DSC_BEB] AS bebida FROM [TB_BEB] WHERE [DSC_BEB] LIKE '%".$pesquisa."%';";
    
            $query = $Conexao->query($queryString);

            $produtos = $query->fetchAll();
            foreach ($produtos as $produto) {
                $retorno[] = $produto['bebida'];
            }

            if($query->rowCount() == 1){
            }else{
            }
        }catch(Exception $e){
        }
        
    }
    else{
    }

    echo json_encode($retorno);
    
?>