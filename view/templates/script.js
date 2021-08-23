// implementa a limpeza caracter a caracter, um a um....
$(function(){

    $("#tela").on("keyup", validaTela);
    $(".mun, .zero, .btn").on("click", validaTela);

    clickHistorico();

    
    $("#result").click(function(){
        var numb = $('#tela').val();
        // console.log(numb);
        
        //Ajax jquery - envio dos números para o php
        $.ajax({
            method: "POST",
            url: "../controller/controlador.php",
            data: {
                'acao' : 'igual'
                ,'numero' : numb
            },
            success: function( data ){
                var resposta = JSON.parse(data);
                $('#tela').val(resposta.valor);

                var resHist = resposta.his;
                var htmlConstruir = "";
                resHist.forEach(elem => {
                    htmlConstruir += '<li title="'+elem[1]+'"><button class="historico"><numero>'+elem[0]+'</numero> = '+elem[2]+'</button></li>';
                    $('.local-historico').html(htmlConstruir)
                    // console.log(elem[0]);
                    clickHistorico();
                })
            }
        });
    });

    $("#limpar").click(function(){
        var qtnum = $(".visor").val();
        var nextnum = (qtnum.length) -1;

        var newnum = "";
        for(var i=0; i <= nextnum; i++){
            if(i != nextnum){

                //console.log(qtnum[i]);
                //console.log[i];
                newnum += qtnum[i];
            }
        }
        $(".visor").val(newnum);
    });

});

function clickHistorico(){
    $(".historico").click(function(){
        var valorBotaoClicado = $(this).find('numero').text();
        console.log(valorBotaoClicado);
        $("#tela").val(valorBotaoClicado);
    });
}

//controla para que não coloque um operador ao lado do outro
$(function(controlaOperador){

    
})

//implementa a escrita no visor principal
function nume(num) {
    if (typeof gvisor == 'undefined') {
        document.calcula.tela.value="";
    }
    document.calcula.tela.value = document.calcula.tela.value + num;
    gvisor = 1;
}

//função clear, limpa tudo no campo de texto.... ou número
function deleteAll(){
    document.calcula.tela.value = '';
    
    delete gvisor;
}


function validaTela(){
    var textoTela = $("#tela").val();
    var newTextTela = '';
    var intText = textoTela.length;
    var arrValidos = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '+', ,'-','/','*'];
    var arrOperadores = ['+', ,'-','/','*'];
    for (var i = 0; i < intText; i++) {

        if(arrValidos.indexOf(textoTela[i]) != -1 ){

            
            var verificaOperador = arrOperadores.indexOf(textoTela[i]) != -1 ;
            var verificaOperadorAnterior = arrOperadores.indexOf(textoTela[i-1]) != -1 ;

            console.log(verificaOperador );

            if(verificaOperador && verificaOperadorAnterior){
                newTextTela = newTextTela;
            } else {
                newTextTela += textoTela[i];
            }
            
        } else {
            newTextTela = newTextTela;
        }
        $("#tela").val(newTextTela);
        

    }
}