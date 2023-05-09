<?php
    include_once("../../../conf/conexaoBd.php");

    $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);

    $retorno = array();

    if(!empty($cpf)){
        try{
            $Conexao = Conexao::getConnection();
    
            $queryString = "
                SELECT TOP 1
                    cli.CPF_CLI as cpf,
                    cli.TEL_CLI as tel,
                    cli.NM_CLI as nome,
                    ende.CEP_END as cep,
                    ende.LGD_END as ender,
                    ende.NM_END as num,
                    ende.BRO_END as bro,
                    ende.CMP_END as compl,
                    ende.CID_END as cid,
                    ende.UF_END as uf
                FROM [TB_CLI] as cli
                INNER JOIN [TB_END] as ende on ende.[CPF_CLI] = cli.[CPF_CLI]
                WHERE cli.CPF_CLI = '".$cpf."';
            ";
    
            $retorno = array();
    
            $query = $Conexao->query($queryString);
            
            if($query->rowCount() != 0){
                $retorno = ['erro'=>false, 'data'=> $query->fetchAll()];
            }else{
                $retorno = ['erro'=>true, 'data'=>'Cliente não cadastrado'];
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }    
    }else{
        $retorno =['erro'=>true, 'data'=>'Cpf não informado'];
    }
    
    echo json_encode($retorno)
?>