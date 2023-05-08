<?php

    include_once("../../../conf/conexaoBd.php");

    if( !empty($_GET["feditcpf"]) && !empty($_GET["fedittel"]) && !empty($_GET["feditnome"]) && !empty($_GET["feditcep"]) &&
        !empty($_GET["feditendereco"]) && !empty($_GET["feditnumero"]) && !empty($_GET["feditbairro"]) && !empty($_GET["feditcidade"]) &&
        !empty($_GET["fedituf"])
        ){

        $CPF_CLI = $_GET["feditcpf"];
        $TEL_CLI = $_GET["fedittel"];
        $NM_CLI = $_GET["feditnome"];
        $CEP_END = $_GET["feditcep"];
        $LGD_END = $_GET["feditendereco"];
        $NM_END = $_GET["feditnumero"];
        $BRO_END = $_GET["feditbairro"];
        $CID_END = $_GET["feditcidade"];
        $UF_END = $_GET["fedituf"];
        $CMP_END = (empty($_GET["feditcomplemento"]) ? NULL : $_GET["feditcomplemento"]);
    }
    else{
        echo "REDIRECT ERRO";
        header("location: /pizz/cadastropedido.php?resp=erroinfo");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();

        $queryString = "
            UPDATE [TB_CLI] SET 
                [NM_CLI] = '".$NM_CLI."',
                [TEL_CLI] = '".$TEL_CLI."'
            WHERE [CPF_CLI] = '".$CPF_CLI."';
        ";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'INSERIDO!!';

            $queryString = "
                UPDATE [TB_END] SET
                    [LGD_END] = '".$LGD_END."',
                    [NM_END] = ".$NM_END.",
                    [CEP_END] = '".$CEP_END."',
                    [CID_END] = '".$CID_END."',
                    [BRO_END] = '".$BRO_END."',
                    [UF_END] = '".$UF_END."',
                    [CMP_END] = '".$CMP_END."'
                WHERE [CPF_CLI] = '".$CPF_CLI."';
            ";

            $queryAuth = $Conexao->query($queryString);

            if($queryAuth->rowCount() == 1){
                echo 'INSERIDO LOGIN!!';
            }else{
                echo 'MUUUITO ESTRANHO, BRO!!';
            }

        }else{
            echo 'ESTRANHO!!';
        }

    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }
    echo "REDIRECT FINAL";
    header("location: /pizz/cadastropedido.php?resp=cadsuss");
?>