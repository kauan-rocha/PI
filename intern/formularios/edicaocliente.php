<!DOCTYPE html>
<html lang="pt-br">
<head>
</head>
<body>
    <div class="divpopup">
        <button id="butFechar" onclick="FecharEditaCliente()" >X</button>
        <div class="formCliente">
            <h3>Editar cliente</h3>
            <hr/>
            <form action="/pizz/intern/formularios/operacaoform/editarcliente.php" method="GET">
                <span style="width: 20%;">
                    <label for="feditcpf">CPF:</label>
                    <input type="text" maxlength="11" id="feditcpf" name="feditcpf" style="width: 90%; border: solid 1px;">
                </span>
                <span style="width: 20%;">
                    <label for="fedittel">Telefone:</label>
                    <input type="text" maxlength="11" id="fedittel" name="fedittel" style="width: 90%; border: solid 1px;">
                </span>
                <span style="width: 55%;">
                    <label for="feditnome">Nome:</label>
                    <input type="text" id="feditnome" name="feditnome" style="width: 100%; border: solid 1px;">
                </span>

                <br>

                <span style="width: 15%;">
                    <label for="feditcep">CEP:</label>
                    <input type="text" id="feditcep" name="feditcep" style="width: 90%; border: solid 1px;">
                </span>

                <span style="width: 40%;">
                    <label for="feditendereco">Endereço:</label>
                    <input type="text" id="feditendereco" name="feditendereco" style="width: 96%; border: solid 1px;">
                </span>

                <span style="width: 12%;">
                    <label for="feditnumero">Número:</label>
                    <input type="text" id="feditnumero" name="feditnumero" style="width: 87%; border: solid 1px;">
                </span>

                <span style="width: 30%;">
                    <label for="feditbairro">Bairro:</label>
                    <input type="text" id="feditbairro" name="feditbairro" style="width: 92%; border: solid 1px;">
                </span>

                <br>

                <span style="width: 50%;">
                    <label for="feditcomplemento">Complemento:</label>
                    <input type="text" id="feditcomplemento" name="feditcomplemento" style="width: 96%; border: solid 1px;">
                </span>

                <span style="width: 20%;">
                    <label for="feditcidade">Cidade:</label>
                    <input type="text" id="feditcidade" name="feditcidade" style="width: 90%; border: solid 1px;">
                </span>

                <span style="width: 5%;">
                    <label for="fedituf">UF:</label>
                    <input type="text" id="fedituf" name="fedituf" style="width: 96%; border: solid 1px;">
                </span>

                <span style="margin: 2%; float: right;">
                    <input id="fbutCadCli" type="submit" value="Salvar">
                </span>
            </form>
        </div>
    </div>
</body>
</html>