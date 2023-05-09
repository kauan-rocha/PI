document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function(){
        document.querySelector("#msg-box").classList.toggle("fadeout");
    }, 5000)
});

function cancelarPedido(cod_ped){
    var txt;
    if (confirm("Tem certeza que desenha cancelar o pedido "+cod_ped+"?")) {
        window.location.href = "/pizz/intern/formularios/operacaoform/editarPedido.php?acao=can&cod="+cod_ped;
    }
}

function finalizarPedido(cod_ped){
    var txt;
    if (confirm("Tem certeza que desenha finalizar o pedido "+cod_ped+"?")) {
        window.location.href = "/pizz/intern/formularios/operacaoform/editarPedido.php?acao=fin&cod="+cod_ped;
    }
}