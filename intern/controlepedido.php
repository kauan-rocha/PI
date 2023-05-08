<?php
    include_once(realpath(__DIR__."/../conf/default.php"));
    include_once(realpath(__DIR__."/../conf/conexaoBd.php"));
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="lista">
        <div class="legenda">
            <ul>
                <li>A = Aberto</li>
                <li>C = Cancelado</li>
                <li style="border-right: none;">F = Finalizado</li>
            </ul>
        </div>
        <table>
            <tr>
                <th>COD PEDIDO</th>
                <th style="min-width: 15vw;">CLIENTE</th>
                <th>STATUS</th>
                <th>DATA</th>
                <th style="border-right: none;"></th>
                <th style="border-right: none;"></th>
            </tr>

            <?php
                try{
                    $Conexao = Conexao::getConnection();
            
                    $queryString = "
                        SELECT TOP (30)
                            ped.[CD_PED],
                            CONCAT('(',cli.[CPF_CLI],') ',cli.[NM_CLI]) as [CLIENTE],
                            ped.[STS_PED],
                            ped.[DT_PED]	
                        FROM [TB_PED] as ped
                        INNER JOIN [TB_CLI] as cli ON cli.[CPF_CLI] = ped.CPF_CLI
                        ORDER BY ped.[DT_PED] DESC;
                    ";                    
                    $query = $Conexao->query($queryString);

                    $pedidos = $query->fetchAll();
                    foreach ($pedidos as $pedido) {

                        //echo var_dump($pedido)."<br><br>";
                        echo "
                        <tr>
                            <td style='text-align: center;'>".$pedido["CD_PED"]."</td>
                            <td>".$pedido["CLIENTE"]."</td>
                            <td>".$pedido["STS_PED"]."</td>
                            <td>".$pedido["DT_PED"]."</td>
                            <td><button style='background-color: rgb(248, 134, 119);'".($pedido["STS_PED"]!='A'?"disabled":"onclick='cancelarPedido({$pedido['CD_PED']})'").">Cancelar</button></td>
                            <td style='border-right: none;'><button style='background-color: rgb(245, 185, 117);'".($pedido["STS_PED"]!='A'?"disabled":"onclick='finalizarPedido({$pedido['CD_PED']})'").">Finalizar</button></td>
                        </tr>
                        ";
                    }
                }catch(Exception $e){
                    echo $e->getMessage();
                    exit;
                
                }
            ?>

        </table>
    </div>
</body>
</html>