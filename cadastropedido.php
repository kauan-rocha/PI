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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    </head>
<body>
    <?php include("./intern/estrutura/cabecalho.php") ?>

    <?php include("./intern/estrutura/menu.php") ?>

    <div class="pedido">

        <form action="/pizz/intern/formularios/operacaoform/cadastrarpedido.php" method="POST" onsubmit="return enviarPedido()">

        <div class="resumo">
            <?php include("./intern/resumopedido.php") ?>
        </div>

        <div class="infos">
            <div class="formCliente">
                <h3>Cliente</h3>
                <hr/>
                    <input name="fcpffunc" id="fcpffunc" type="text" style="display:none;" value="<?php echo $_SESSION["sessaoCpf"]?>">
                    <span style="width: 15%;">
                        <label for="fcpf">CPF:</label>
                        <input type="text" maxlength="11" placeholder="Pesquisar" id="fcpf" name="fcpf" style="width: 90%; border: solid 1px;">
                    </span>
                    <span style="width: 20%;">
                        <label for="ftel">Telefone:</label>
                        <input type="text" maxlength="11" id="ftel" name="ftel" style="width: 90%;" disabled>
                    </span>
                    <span style="width: 61%;">
                        <label for="fnome">Nome:</label>
                        <input type="text" id="fnome" name="fnome" style="width: 100%;" disabled>
                    </span>

                    <br>

                    <span style="width: 15%;">
                        <label for="fcep">CEP:</label>
                        <input type="text" id="fcep" name="fcep" style="width: 90%;" disabled>
                    </span>

                    <span style="width: 40%;">
                        <label for="fendereco">Endereço:</label>
                        <input type="text" id="fendereco" name="fendereco" style="width: 96%;" disabled>
                    </span>

                    <span style="width: 12%;">
                        <label for="fnumero">Número:</label>
                        <input type="text" id="fnumero" name="fnumero" style="width: 87%;" disabled>
                    </span>

                    <span style="width: 30%;">
                        <label for="fbairro">Bairro:</label>
                        <input type="text" id="fbairro" name="fbairro" style="width: 96%;" disabled>
                    </span>

                    <br>

                    <span style="width: 50%;">
                        <label for="fcomplemento">Complemento:</label>
                        <input type="text" id="fcomplemento" name="fcomplemento" style="width: 96%;" disabled>
                    </span>

                    <span style="margin: 2%; float: right;">
                        <button type="button" onclick="AbrirEditaCliente()">Editar</button>
                        <button type="button" onclick="AbrirCadastraCliente()">Criar</button>
                    </span>
            </div>

            <div class="formPizza">
                <h3>Pizza</h3>
                <hr/>
                    <input name="fcodpizz" id="fcodpizz" type="number" style="display:none;" value="">
                    <span style="width: 20%;">
                        <label for="fquantidadePizz" style="display: inline-block;">Quantidade:</label>
                        <input type="text" id="fquantidadePizz" name="fquantidadePizz" onchange="buscaPizza()" value="1" style="width: 20%; display: inline-block; border: solid 1px;">
                    </span>

                    <span style="width: 40%; padding-left:4%; border-left: 1px solid black;">
                        <label for="ffamilia" style="display: inline-block;">Tamanho:</label>
                        <input type="radio" id="ffamilia" name="ftamanhopizza" value="familia" onchange="buscaPizza()" checked="checked" style="display: inline-block;">
                        <label for="ffamilia" style="display: inline-block;">Familia</label>
                        <input type="radio" id="fbroto" name="ftamanhopizza" value="broto" onchange="buscaPizza()" style="display: inline-block;">
                        <label for="fbroto" style="display: inline-block;">Broto</label><br>
                    </span>
                    
                    <hr/>

                    <span style="width: 100%;">
                        <label for="fsabor" style="display: inline-block;">Sabor:&nbsp;</label>
                        <input type="text" placeholder="Digite para pesquisar" id="fsabor" onchange="buscaPizza()" name="fsabor" style="width: 87%; display: inline-block; border: solid 1px;">
                    </span>

                    <hr/>

                    <span style="width: 100%;">
                        <label for="fcomplementoPizza" style="display: inline-block;">Adicionais:</label>
                        <div id="fcomplementoPizza">
                            <input type="checkbox" id="complCebola" name="fadicional" value="Cebola" style="display: inline-block;">
                            <label for="complCebola" style="display: inline-block;">Cebola</label>

                            <input type="checkbox" id="complTomate" name="fadicional" value="Tomate" style="display: inline-block;">
                            <label for="complTomate" style="display: inline-block;">Tomate</label>

                            <input type="checkbox" id="complPalmito" name="fadicional" value="Palmito" style="display: inline-block;">
                            <label for="complPalmito" style="display: inline-block;">Palmito</label>
                        </div>
                    </span>

                    <br>

                    <span style="width: 30%; padding-top: 2%;">
                        <label for="fvalorPizza" style="display: inline-block;">Valor:&nbsp;</label>
                        <input type="text" id="fvalorPizza" name="fvalorPizza" value="R$ 0.00" style="width: 30%; display: inline-block;" disabled>
                    </span>
                    <span style="padding-top: 1%; float: right;">
                        <button type="button" id="fbutAddPizz" onclick="addPizza()">Adicionar +</button>
                    </span>
                    <br>
                
            </div>

            <div class="formBebida">
                <h3>Bebida</h3>
                <hr/>
                <input name="fcodbebida" id="fcodbebida" type="number" style="display:none;" value="">
                    <span style="width: 30%;">
                        <label for="fquantidadeBebida" onchange="buscaBebida()" style="display: inline-block;">Quantidade:</label>
                        <input type="text" id="fquantidadeBebida" name="fquantidadeBebida" value="1" style="width: 20%; display: inline-block; border: solid 1px;">
                    </span>
                    
                    <hr/>

                    <span style="width: 100%;">
                        <label for="fbebida" style="display: inline-block;">Bedida:&nbsp;</label>
                        <input type="text" id="fbebida" onchange="buscaBebida()" placeholder="Digite para pesquisar" name="fbebida" style="width: 60%; display: inline-block;" >
                        <label for="fvalorBebida" style="display: inline-block;">Total:</label>
                        <input type="text" id="fvalorBebida" name="fvalorBebida" value="R$ 0.00" style="width: 20%; display: inline-block;" disabled>
                    </span>

                    <br>
                    <span style="padding-top: 1%; float: right;">
                        <input id="fbutAddBebida" type="button" onclick="addBebida()" value="Adicionar +">
                    </span>
                    <br> <br>
                

            </div>
        </div>

        <div class="venda">
            <div class="pagamento">
                <section>
                    <input name="fvalortotal" id="fvalortotal" type="text" style="display:none;" value="">
                    <h2 id="total">Total: R$0.00</h2>
                </section>
                <section>
                    <label for="fformapagto">Forma de pagamento</lable>
                    <select name="fformapagto" id="fformapagto">
                        <option value="C">Credito</option>
                        <option value="D">Debito</option>
                        <option value="E">Dinheiro</option>
                    </select>
                </section>
                <section><button class="enviarPedido" type="submit">Enviar Pedido</button></section>
            </div>
        </div>
        </form>
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
            elseif($_GET["resp"] == "suss")
                echo "<div id='msg-box' style='background-color: darkseagreen;'><p>PEDIDO REALIZADO COM SUCESSO!!</p></div>";
            elseif($_GET["resp"] == "erro")
                echo "<div id='msg-box' style='background-color: #EC7063;'><p>Erro no pedido! Tente novamente.</p></div>";
        }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <script src="js/cadastropedido.js"></script>
</body>
</html>