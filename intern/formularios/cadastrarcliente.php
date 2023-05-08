<!DOCTYPE html>
<html lang="pt-br">
<head>
</head>
<body>
    <div class="divpopup">
        <button id="butFechar" onclick="FecharCadastraCliente()" >X</button>
        <div class="formCliente">
            <h3>Cadastrar cliente</h3>
            <hr/>
            <form action="/pizz/intern/formularios/operacaoform/cadastrarcliente.php" method="GET">
                <span style="width: 20%;">
                    <label for="fcadcpf">CPF:</label>
                    <input type="text" maxlength="11" id="fcadcpf" name="fcadcpf" style="width: 90%; border: solid 1px;">
                </span>
                <span style="width: 20%;">
                    <label for="fcadtel">Telefone:</label>
                    <input type="text" maxlength="11" id="fcadtel" name="fcadtel" style="width: 90%; border: solid 1px;">
                </span>
                <span style="width: 55%;">
                    <label for="fcadnome">Nome:</label>
                    <input type="text" id="fcadnome" name="fcadnome" style="width: 100%; border: solid 1px;">
                </span>

                <br>

                <span style="width: 15%;">
                    <label for="fcadcep">CEP:</label>
                    <input type="text" id="fcadcep" name="fcadcep" style="width: 90%; border: solid 1px;">
                </span>

                <span style="width: 40%;">
                    <label for="fcadendereco">Endereço:</label>
                    <input type="text" id="fcadendereco" name="fcadendereco" style="width: 96%; border: solid 1px;">
                </span>

                <span style="width: 12%;">
                    <label for="fcadnumero">Número:</label>
                    <input type="text" id="fcadnumero" name="fcadnumero" style="width: 87%; border: solid 1px;">
                </span>

                <span style="width: 30%;">
                    <label for="fcadbairro">Bairro:</label>
                    <input type="text" id="fcadbairro" name="fcadbairro" style="width: 92%; border: solid 1px;">
                </span>

                <br>

                <span style="width: 50%;">
                    <label for="fcadcomplemento">Complemento:</label>
                    <input type="text" id="fcadcomplemento" name="fcadcomplemento" style="width: 96%; border: solid 1px;">
                </span>

                <span style="width: 20%;">
                    <label for="fcadcidade">Cidade:</label>
                    <input type="text" id="fcadcidade" name="fcadcidade" style="width: 90%; border: solid 1px;">
                </span>

                <span style="width: 5%;">
                    <label for="fcaduf">UF:</label>
                    <input type="text" id="fcaduf" name="fcaduf" style="width: 96%; border: solid 1px;">
                </span>

                <span style="margin: 2%; float: right;">
                    <input id="fbutCadCli" type="submit" value="Cadastrar">
                </span>
            </form>
        </div>
    </div>
</body>
</html>