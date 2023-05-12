<?php
    include_once("../../../conf/conexaoBd.php");

    if(!empty($_GET["bebida"])){
        $bebida = $_GET["bebida"];
    }

    $retorno = array();

    if(!empty($bebida)){
        try{
            $Conexao = Conexao::getConnection();
    
            $queryString = "
                SELECT TOP 1 
                beb.[CD_BEB] as cod_beb, beb.[DSC_BEB] as bebida, beb.[VLR_BEB] as vlr_beb, mar.[DSC_MAR] as marca
                FROM [TB_BEB] beb
                INNER JOIN TB_MAR mar ON beb.CD_MAR = mar.CD_MAR
                WHERE beb.DSC_BEB = '".$bebida."';
            ";
    
            $retorno = array();
    
            $query = $Conexao->query($queryString);
            
            if($query->rowCount() != 0){
                $retorno = ['erro'=>false, 'data'=> $query->fetchAll()];
            }else{
                $retorno = ['erro'=>true, 'data'=>'Bebida não cadastrada'];
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }    
    }else{
        $retorno =['erro'=>true, 'data'=>'Bebida não informada'];
    }
    
    echo json_encode($retorno)
?>