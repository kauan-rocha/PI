<?php

    include_once("../../../conf/conexaoBd.php");

    if( !empty($_GET["fcadcpf"]) && !empty($_GET["fcadtel"]) && !empty($_GET["fcadnome"]) && !empty($_GET["fcadcep"]) &&
        !empty($_GET["fcadendereco"]) && !empty($_GET["fcadnumero"]) && !empty($_GET["fcadbairro"]) && !empty($_GET["fcadcidade"]) &&
        !empty($_GET["fcaduf"])
        ){

        $CPF_CLI = $_GET["fcadcpf"];
        $TEL_CLI = $_GET["fcadtel"];
        $NM_CLI = $_GET["fcadnome"];
        $CEP_END = $_GET["fcadcep"];
        $LGD_END = $_GET["fcadendereco"];
        $NM_END = $_GET["fcadnumero"];
        $BRO_END = $_GET["fcadbairro"];
        $CID_END = $_GET["fcadcidade"];
        $UF_END = $_GET["fcaduf"];
        $CMP_END = (empty($_GET["fcadcomplemento"]) ? NULL : $_GET["fcadcomplemento"]);
    }
    else{
        echo "Algo faltando - redirect";
        header("location: /pizz/cadastropedido.php?resp=erroinfo");
        die;
    }
    
    try{
        $Conexao = Conexao::getConnection();
        $queryString = "
            INSERT INTO [TB_CLI]([CPF_CLI],[NM_CLI],[TEL_CLI],[DT_CAD_CLI])
            VALUES(
                '".$CPF_CLI."',
                '".$NM_CLI."',
                '".$TEL_CLI."',
                CONVERT(date, GETDATE())
            );
        ";

        $query = $Conexao->query($queryString);
        
        if($query->rowCount() == 1){
            echo 'INSERIDO!!';

            $queryString = "
                INSERT INTO [TB_END]([LGD_END],[NM_END],[CEP_END],[CID_END],[BRO_END],[UF_END],[CMP_END],[CPF_CLI])
                VALUES(
                    '".$LGD_END."',
                    ".$NM_END.",
                    '".$CEP_END."',
                    '".$CID_END."',
                    '".$BRO_END."',
                    '".$UF_END."',
                    '".$CMP_END."',
                    '".$CPF_CLI."'
                );
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
    header("location: /pizz/cadastropedido.php?resp=cadsuss");

?>