const cepCad = document.querySelector("#fcadcep");
const cepEdit = document.querySelector("#feditcep");

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function(){
        document.querySelector("#msg-box").classList.toggle("fadeout");
    }, 5000)
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
    consultaCep(pesquisa, "#fcadendereco", "#fcadbairro", "#fcadcidade", "#fcaduf") 
})

cepEdit.addEventListener("blur", (e) =>{
    let pesquisa = cepEdit.value.replace("-","");
    consultaCep(pesquisa, "#feditendereco", "#feditbairro", "#feditcidade", "#fedituf")    
})

function consultaCep(valor, end, brr, cid, uf){
    const options = {
        method: 'GET',
        mode: 'cors',
        cache:'default'
    };

    return fetch(`https://viacep.com.br/ws/${valor}/json/`, options)
    .then(response => { response.json()
        .then( data => {
            document.querySelector(end).value = data["logradouro"];
            document.querySelector(brr).value = data["bairro"];
            document.querySelector(cid).value = data["localidade"];
            document.querySelector(uf).value = data["uf"];
            document.querySelector(end).style.borderColor = "black";
            document.querySelector(brr).style.borderColor = "black";
            document.querySelector(cid).style.borderColor = "black";
            document.querySelector(uf).style.borderColor = "black";
        })
    })
    .catch(e => {
        console.log("Erro: " + e.message);
        document.querySelector(end).style.borderColor = "red";
        document.querySelector(brr).style.borderColor = "red";
        document.querySelector(cid).style.borderColor = "red";
        document.querySelector(uf).style.borderColor = "red";
    });
}
