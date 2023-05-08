<?php
    include_once(realpath(__DIR__."/conf/default.php"));
    if(empty($_SESSION["sessaoUser"])){
        header("location: login.php");
        console.log($_SESSION["sessaoUser"]);
        die;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pedido</title>
        <link rel="stylesheet" href="./conf/format/estiloPizzariaCadPedido.css">
        <link rel="shortcut icon" type="image/x-icon" href="./conf/imgs/iconpizza.ico">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="pedido">
        <div class="resumo">

        </div>

        <div class="infos">
            <div class="formCliente">
                <h3>Cliente</h3>
                <hr/>
                <form action="" method="POST">
                    <span style="width: 15%;">
                        <label for="fcpf">CPF:</label>
                        <input type="text" maxlength="11" id="fcpf" name="fcpf" style="width: 90%; border: solid 1px;">
                    </span>
                    <span style="width: 20%;">
                        <label for="ftel">Telefone:</label>
                        <input type="text" maxlength="11" id="ftel" name="ftel" style="width: 90%; border: solid 1px;">
                    </span>
                    <span style="width: 61%;">
                        <label for="fnome">Nome:</label>
                        <input type="text" id="fnome" name="fnome" style="width: 100%;" readonly>
                    </span>

                    <br>

                    <span style="width: 15%;">
                        <label for="fcep">CEP:</label>
                        <input type="text" id="fcep" name="fcep" style="width: 90%;" readonly>
                    </span>

                    <span style="width: 40%;">
                        <label for="fendereco">Endereço:</label>
                        <input type="text" id="fendereco" name="fendereco" style="width: 96%;" readonly>
                    </span>

                    <span style="width: 12%;">
                        <label for="fnumero">Número:</label>
                        <input type="text" id="fnumero" name="fnumero" style="width: 87%;" readonly>
                    </span>

                    <span style="width: 30%;">
                        <label for="fbairro">Bairro:</label>
                        <input type="text" id="fbairro" name="fbairro" style="width: 96%;" readonly>
                    </span>

                    <br>

                    <span style="width: 50%;">
                        <label for="fcomplemento">Complemento:</label>
                        <input type="text" id="fcomplemento" name="fcomplemento" style="width: 96%;" readonly>
                    </span>

                    <span style="margin: 2%; float: right;">
                        <button type="button" onclick="AbrirEditaCliente()">Editar</button>
                        <button type="button" onclick="AbrirCadastraCliente()">Criar</button>
                    </span>
                </form>
            </div>

            <div class="formPizza">
                <h3>Pizza</h3>
                <hr/>
                <form action="" method="POST">
                    <span style="width: 30%;">
                        <label for="fquantidadePizz" style="display: inline-block;">Quantidade:</label>
                        <input type="text" id="fquantidadePizz" name="fquantidadePizz" value="1" style="width: 20%; display: inline-block; border: solid 1px;">
                    </span>
                    
                    <hr/>

                    <span style="width: 100%;">
                        <label for="fsabor1" style="display: inline-block;">Sabor:&nbsp;</label>
                        <input type="text" id="fsabor1" name="fsabor1" style="width: 87%; display: inline-block; border: solid 1px;">
                    </span>

                    <hr/>

                    <span style="width: 100%;">
                        <label for="fcomplementoPizza" style="display: inline-block;">Complementos:</label>
                        <div id="fcomplementoPizza">
                            <input type="checkbox" id="complCebola" name="complCebola" value="Cebola" style="display: inline-block;">
                            <label for="complCebola" style="display: inline-block;">Cebola</label>

                            <input type="checkbox" id="complTomate" name="complTomate" value="Tomate" style="display: inline-block;">
                            <label for="complTomate" style="display: inline-block;">Tomate</label>

                            <input type="checkbox" id="complPalmito" name="complPalmito" value="Palmito" style="display: inline-block;">
                            <label for="complPalmito" style="display: inline-block;">Palmito</label>
                        </div>
                    </span>

                    <br>

                    <span style="width: 30%; padding-top: 2%;">
                        <label for="fvalorPizza" style="display: inline-block;">Valor:&nbsp;</label>
                        <input type="text" id="fvalorPizza" name="fvalorPizza" value="R$ 0,00" style="width: 30%; display: inline-block;" readonly>
                    </span>
                    <span style="padding-top: 1%; float: right;">
                        <input id="fbutAddPizz" type="submit" value="Adicionar +">
                    </span>
                    <br>
                </form>
            </div>

            <div class="formBebida">
                <h3>Bebida</h3>
                <hr/>
                <form action="" method="POST">
                    <span style="width: 30%;">
                        <label for="fquantidadeBebida" style="display: inline-block;">Quantidade:</label>
                        <input type="text" id="fquantidadeBebida" name="fquantidadeBebida" value="1" style="width: 20%; display: inline-block; border: solid 1px;">
                    </span>
                    
                    <hr/>

                    <span style="width: 100%;">
                        <label for="fbebida" style="display: inline-block;">Bedida:&nbsp;</label>
                        <input type="text" id="fbebida" name="fbebida" style="width: 60%; display: inline-block; border: solid 1px;" >
                        <label for="fvalorBebida" style="display: inline-block;">Total:</label>
                        <input type="text" id="fvalorBebida" name="fvalorBebida" style="width: 20%; display: inline-block;" readonly>
                    </span>

                    <br>
                    <span style="padding-top: 1%; float: right;">
                        <input id="fbutAddBebida" type="submit" value="Adicionar +">
                    </span>
                    <br> <br>
                </form>

            </div>
        </div>

        <div class="venda">
            
        </div>
    </div>

    <div class="fundopopup" id="cadastracliente" style="display: none;">
        <?php include("./intern/formularios/cadastrarcliente.php") ?>
    </div>

    <div class="fundopopup" id="editacliente" style="display: none;">
        <?php include("./intern/formularios/edicaocliente.php") ?>
    </div>

    <?php
        if(!empty($_GET["resp"])){
            if($_GET["resp"] == "cadsuss")
                echo "<div id='msg-box' style='background-color: darkseagreen;'><p>Cadastro realizado com sucesso!!</p></div>";
            elseif($_GET["resp"] == "erroinfo")
                echo "<div id='msg-box' style='background-color: #EC7063;'><p>Erro no cadastro! Valide os campos do formulário.</p></div>";
        }
    ?>
    <script src="js/cadastropedido.js"></script>
</body>
</html>