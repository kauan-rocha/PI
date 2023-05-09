<?php
    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["sabor"]) && !empty($_GET["tamanho"])){
        $sabor = $_GET["sabor"];
        $tamanho = $_GET["tamanho"];
    }

    $retorno = array();

    if(!empty($sabor) && !empty($tamanho)){
        try{
            $Conexao = Conexao::getConnection();
    
            $queryString = "
                SELECT DISTINCT TOP 1 CD_PIZ cod_piz, DSC_PIZ sabor, TMN_PIZ tam, VLR_PIZ vlr_piz FROM [TB_PIZ] 
                WHERE [DSC_PIZ] = '".$sabor."' AND [TMN_PIZ]='".$_GET["tamanho"]."';
            ";
    
            $retorno = array();
    
            $query = $Conexao->query($queryString);
            
            if($query->rowCount() != 0){
                $retorno = ['erro'=>false, 'data'=> $query->fetchAll()];
            }else{
                $retorno = ['erro'=>true, 'data'=>'Pizza não cadastrada'];
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }    
    }else{
        $retorno =['erro'=>true, 'data'=>'Pizza não informada'];
    }
    
    echo json_encode($retorno)
?>