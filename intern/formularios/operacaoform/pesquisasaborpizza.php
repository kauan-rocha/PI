<?php
    include_once("../../../conf/conexaoBd.php");

    $pesquisa = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

    $retorno;
    
    if(!empty($pesquisa)){
        try{
            $Conexao = Conexao::getConnection();
    
            $queryString = "SELECT DISTINCT TOP 6 [DSC_PIZ] AS pizza FROM [TB_PIZ] WHERE [DSC_PIZ] LIKE '%".$pesquisa."%';";
    
            $query = $Conexao->query($queryString);

            $sabores = $query->fetchAll();
            foreach ($sabores as $sabor) {
                $retorno[] = $sabor['pizza'];
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