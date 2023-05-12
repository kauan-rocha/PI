//======================= Funções da seção CLIENTE

const cepCad = document.querySelector("#fcadcep");
const cepEdit = document.querySelector("#feditcep");
const cpfCli = document.querySelector("#fcpf");

const cpfEditCli = document.querySelector("#feditcpf");

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function(){
        document.querySelector("#msg-box").classList.toggle("fadeout");
    }, 4000);
});

function FecharCadastraCliente(){
    document.getElementById('cadastracliente').style.display = 'none';
}

function AbrirCadastraCliente(){
    document.getElementById('cadastracliente').style.display = 'block';
}

function FecharEditaCliente(){
    document.getElementById('editacliente').style.display = 'none';
}

function AbrirEditaCliente(){
    document.getElementById('editacliente').style.display = 'block';
}

cepCad.addEventListener("blur", (e) =>{
    let pesquisa = cepCad.value.replace("-","");
    var dict = { 
        "#fcadendereco": "logradouro",
        "#fcadbairro": "bairro",
        "#fcadcidade": "localidade",
        "#fcaduf": "uf"
    };
    consultaCep(pesquisa, dict) 
});

cepEdit.addEventListener("blur", (e) =>{
    let pesquisa = cepEdit.value.replace("-","");
    var dict = { 
        "#feditendereco": "logradouro",
        "#feditbairro": "bairro",
        "#feditcidade": "localidade",
        "#fedituf": "uf"
    };
    consultaCep(pesquisa, dict)    
});

cpfCli.addEventListener("blur", (e) =>{
    let pesquisa = cpfCli.value;
    var dict = { 
        "#ftel": "tel",
        "#fnome": "nome",
        "#fcep": "cep",
        "#fendereco": "ender",
        "#fnumero": "num",
        "#fbairro": "bro",
        "#fcomplemento": "compl"
    };
    buscaCliente(dict, pesquisa);
});

cpfEditCli.addEventListener("blur", (e) =>{
    let pesquisa = cpfEditCli.value;
    var dict = { 
        "#fedittel": "tel",
        "#feditnome": "nome",
        "#feditcep": "cep",
        "#feditendereco": "ender",
        "#feditnumero": "num",
        "#feditbairro": "bro",
        "#feditcomplemento": "compl",
        "#feditcidade": "cid",
        "#fedituf": "uf"
    };
    buscaCliente(dict,pesquisa);
    for (var key in dict)
        document.querySelector(key).disabled = false;
});

async function buscaCliente(dict,pesquisa){
    const data = await  fetch('/pizz/intern/formularios/operacaoform/buscarcliente.php?cpf='+pesquisa);
    const retorno = await data.json();

    if(retorno['erro']==false){
        for (var key in dict){
            document.querySelector(key).value = retorno['data'][0][dict[key]];  
        }
    }else{
        for (var key in dict)
            document.querySelector(key).value = "";
        document.querySelector(Object.keys(dict)[1]).value = retorno['data'];
    }
}

function consultaCep(valor, dict){
    const options = {
        method: 'GET',
        mode: 'cors',
        cache:'default'
    };

    return fetch(`https://viacep.com.br/ws/${valor}/json/`, options)
    .then(response => { response.json()
        .then( data => {
            for (var key in dict){
                document.querySelector(key).value = data[dict[key]];
                document.querySelector(key).style.borderColor = "black";
            } 
        })
    })
    .catch(e => {
        for (var key in dict){
            document.querySelector(key).value = "";
            document.querySelector(key).style.borderColor = "red";
        } 
    });
}

//======================= Funções da seção PIZZA

$(function(){
    $('#fsabor').autocomplete({
        source: '/pizz/intern/formularios/operacaoform/pesquisasaborpizza.php'
    });
});

$(function(){
    $('#fbebida').autocomplete({
        source: '/pizz/intern/formularios/operacaoform/pesquisabebida.php'
    });
});

async function buscaPizza(){
    let qtd = document.querySelector('#fquantidadePizz').value;
    let sabor = document.querySelector('#fsabor').value;
    let tamanho = document.querySelector('input[name="ftamanhopizza"]:checked').value;

    var dict = {"#fcodpizz": "cod_piz","#fvalorPizza": "vlr_piz"};

    const data = await  fetch('/pizz/intern/formularios/operacaoform/buscarpizza.php?sabor='+sabor+'&tamanho='+tamanho);
    const retorno = await data.json();

    if(retorno['erro']==false){
        document.querySelector('#fcodpizz').value = retorno['data'][0]['cod_piz'];  
        document.querySelector('#fvalorPizza').value = "R$ "+(parseFloat(retorno['data'][0]['vlr_piz']) * parseFloat(qtd)).toFixed(2).toString();  

    }else{
        for (var key in dict)
            document.querySelector(key).value = "R$ 0.0";
    }
}

function addPizza(){
    var cod = document.querySelector('#fcodpizz').value;
    var qtd = document.querySelector('#fquantidadePizz').value;
    var tmn = document.querySelector('input[name="ftamanhopizza"]:checked').value;
    var sabor = document.querySelector('#fsabor').value;
    var obs = Array.from(document.querySelectorAll("input[name='fadicional']:checked")).map((elem) => elem.value);
    var valor = document.querySelector('#fvalorPizza').value.split(' ')[1];
    var tipo = "P";

    document.querySelector('#fcodpizz').value = "";
    document.querySelector('#fquantidadePizz').value = "1";
    document.querySelector('input[id="ffamilia"]').checked = true;
    document.querySelector('#fsabor').value = "";
    for (const checkbox of document.querySelectorAll("input[name='fadicional']")) {    
        checkbox.checked = false;
    }
    document.querySelector('#fvalorPizza').value = "R$ 0.00";

    addItem(cod, tipo, qtd, sabor, tmn, obs, valor);
}

async function buscaBebida(){
    let qtd = document.querySelector('#fquantidadeBebida').value;
    let bebida = document.querySelector('#fbebida').value;

    var dict = {"#fcodbebida": "cod_beb","#fvalorBebida": "vlr_beb"};

    const data = await  fetch('/pizz/intern/formularios/operacaoform/buscarbebida.php?bebida='+bebida);
    const retorno = await data.json();

    if(retorno['erro']==false){
        document.querySelector('#fcodbebida').value = retorno['data'][0]['cod_beb'];  
        document.querySelector('#fvalorBebida').value = "R$ "+(parseFloat(retorno['data'][0]['vlr_beb']) * parseFloat(qtd)).toFixed(2).toString();  

    }else{
        document.querySelector('#fvalorBebida').value = "R$ 0.00";
    }
}

function addBebida(){
    var cod = document.querySelector('#fcodbebida').value;
    var qtd = document.querySelector('#fquantidadeBebida').value;
    var tmn = "";
    var bebida = document.querySelector('#fbebida').value;
    var obs = "";
    var valor = document.querySelector('#fvalorBebida').value.split(' ')[1];
    var tipo = "B";

    document.querySelector('#fcodbebida').value = "";
    document.querySelector('#fquantidadeBebida').value = "1";
    document.querySelector('#fbebida').value = "";
    document.querySelector('#fvalorBebida').value = "R$ 0.00";

    addItem(cod, tipo, qtd, bebida, tmn, obs, valor);
}

var controleItem = 0;
function addItem(cod, tipo, qtd, item, tmn, obs, valor){
    var adicional = "";
    for (const checkbox of obs) {    
        adicional = adicional + "+"+checkbox+" ";
    }
    console.log(adicional);
    document.getElementById('tableItens').insertAdjacentHTML('beforeend','<tr id="item['+controleItem+']"><td id="cod-item" style="display: none;"><input name="cod-item['+controleItem+']" id="cod-item['+controleItem+']" type="number" style="display:none;" value="'+cod+'"/>'+cod+'</td><td id="tipo-item" style="display: none;"><input name="tipo-item['+controleItem+']" id="tipo-item['+controleItem+']" type="text" style="display:none;" value="'+tipo+'"/>'+tipo+'</td><td id="qtd-item" style="text-align: center;"><input name="qtd-item['+controleItem+']" id="qtd-item['+controleItem+']" type="number" style="display:none;" value="'+qtd+'"/>'+qtd+'</td><td>'+item+'</td><td id="tmn-item">'+tmn+'</td><td id="obs-item"><input name="obs-item['+controleItem+']" id="obs-item['+controleItem+']" type="text" style="display:none;" value="'+adicional+'"/>'+adicional+'</td><td id="vlr-item" style="text-align: right; padding-right: 0.5vw;">'+valor+'</td><td><button type="button" class="bCancelarItem" onclick="cancelarItem('+controleItem+')">x</button></td></tr>');
    controleItem=controleItem+1;
    recalculaTotal()
}

function cancelarItem(id){
    document.getElementById('item['+id+']').remove();
    recalculaTotal()
}

function recalculaTotal(){
    var valorTotalPedido = 0;
    for (const valores of document.querySelectorAll("#vlr-item")) {    
        valorTotalPedido = valorTotalPedido + parseFloat(valores.innerHTML);
    }
    document.getElementById('fvalortotal').value = valorTotalPedido.toFixed(2);
    document.querySelector('#total').innerHTML = "Total: R$"+ valorTotalPedido.toFixed(2).toString();
}


function enviarPedido(){
    if(document.querySelector('#fcpf').value == "" || document.querySelector('#fnome').value == "Cliente não cadastrado" || document.querySelector('#fnome').value == "Cpf não informado"){
        alert("Informe um CPF de cliente valido!");
        return false;
    }

    if(document.querySelector('#fformapagto').value == ""){
        alert("Informe a forma de pagamento!");
        return false;
    }

    var validaitem = document.querySelectorAll("#cod-item");
    if(validaitem.length == 0){
        alert("Inclua pelo menos 1 item no pedido!");
        return false;
    }else{
        for (const item of document.querySelectorAll("#cod-item")) {    
            if(item.querySelector('input').value == ""){
                alert("Erro no item!! \nValide os itens do pedido.");
                console.log(item.getElementsByTagName('input').value);
                return false;
            }
        }
    }
}