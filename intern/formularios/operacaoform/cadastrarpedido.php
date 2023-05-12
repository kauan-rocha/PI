<?php
    include_once("../../../conf/conexaoBd.php");

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    try{
        $Conexao = Conexao::getConnection();
        $queryString = "
            INSERT INTO [TB_PED]([DT_PED],[STS_PED],[CPF_CLI],[CPF_FUN])
            VALUES(
                CONVERT(date, GETDATE()),
                'A',
                '".$dados["fcpf"]."',
                '".$dados["fcpffunc"]."');
        ";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            
            $queryString = "SELECT TOP 1 CD_PED FROM TB_PED WHERE CPF_CLI='".$dados["fcpf"]."' ORDER BY CD_PED DESC;";

            $queryPedido= $Conexao->query($queryString);
            $codigo_pedido = $queryPedido->fetchAll();

            if($queryPedido->rowCount() == 1){
                $codigo_pedido[0]['CD_PED'];

                $queryString = "
                    INSERT INTO [TB_VEN]([VLR_TOTAL],[CD_PED],[CD_TIP_PAG])
                    VALUES (
                        ".$dados["fvalortotal"].",
                        ".$codigo_pedido[0]['CD_PED'].",
                        '".$dados["fformapagto"]."');
                ";

                $query = $Conexao->query($queryString);

                foreach($dados['cod-item'] as $chave => $valor){

                    if($dados['tipo-item'][$chave] == 'P'){
                        $selectpreco = 'SELECT VLR_PIZ FROM TB_PIZ WHERE CD_PIZ='.$valor.'';
                    }else{
                        $selectpreco = 'SELECT VLR_BEB FROM TB_BEB WHERE CD_BEB='.$valor.'';
                    }

                    $queryString = "
                        INSERT INTO [TB_ITEM_PED]([QTD_ITEM_PED],[CD_ITEM],[TIPO_ITEM],[VLR_ITEM],[CD_PED],[OBS_ITEM]) VALUES(
                            ".$dados['qtd-item'][$chave].",
                            ".$valor.",
                            '".$dados['tipo-item'][$chave]."',
                            (".$selectpreco."),
                            ".$codigo_pedido[0]['CD_PED'].",
                            '".$dados['obs-item'][$chave]."');
                    ";

                    $query= $Conexao->query($queryString);
                }


            }else{
                
            }

        }else{
            echo 'ESTRANHO!!';
        }

    }catch(Exception $e){
        echo $e->getMessage();
        header("location: /pizz/cadastropedido.php?resp=erro");
        die;
    }

    header("location: /pizz/cadastropedido.php?resp=suss");
    die;

?>