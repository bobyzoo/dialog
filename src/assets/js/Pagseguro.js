var amount = $('#amount').val();
//var amount = "600.00";
pagamento();

function pagamento() {
    //Endereco padrão do projeto
    var endereco = jQuery('.endereco').attr("data-endereco");
    $.ajax({

        //URL completa do local do arquivo responsável em buscar o ID da sessão
        url: "pagamento",
        type: 'POST',
        dataType: 'json',
        success: function (retorno) {

            //ID da sessão retornada pelo PagSeguro
            console.log(retorno)
            PagSeguroDirectPayment.setSessionId(retorno.id);
        },
        complete: function (retorno) {
            listarMeiosPag();
        }
    });
}

function listarMeiosPag() {
    console.log("tste")
    PagSeguroDirectPayment.getPaymentMethods({
        amount: amount,
        success: function (retorno) {
            console.log(retorno);
            //Recuperar as bandeiras do cartão de crédito
            $('.meio-pag').append("<div>Cartão de Crédito</div>");
            $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj) {
                $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'></span>");
            });
        },
        error: function (retorno) {
            // Callback para chamadas que falharam.
            console.log(retorno);
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
            //recupTokemCartao();
        }
    });
}

//Receber os dados do formulário, usando o evento "keyup" para receber sempre que tiver alguma alteração no campo do formulário
$('#numCartao').on('keyup', function () {

    //Receber o número do cartão digitado pelo usuário
    var numCartao = $(this).val();

    //Contar quantos números o usuário digitou
    var qntNumero = numCartao.length;

    //Validar o cartão quando o usuário digitar 6 digitos do cartão
    if (qntNumero == 6) {

        //Instanciar a API do PagSeguro para validar o cartão
        PagSeguroDirectPayment.getBrand({
            cardBin: numCartao,
            success: function (retorno) {
                $('#msg').empty();

                //Enviar para o index a imagem da bandeira
                var imgBand = retorno.brand.name;
                $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgBand + ".png'>");
                $('#bandeiraCartao').val(imgBand);
                recupParcelas(imgBand);
            },
            error: function (retorno) {

                //Enviar para o index a mensagem de erro
                $('.bandeira-cartao').empty();
                $('#msg').html("Cartão inválido");
            }
        });
    }
});

//Recuperar a quantidade de parcelas e o valor das parcelas no PagSeguro
function recupParcelas(bandeira) {
    var noIntInstalQuantity = $('#noIntInstalQuantity').val();
    $('#qntParcelas').html('<option value="">Selecione</option>');
    PagSeguroDirectPayment.getInstallments({

        //Valor do produto
        amount: amount,

        //Quantidade de parcelas sem juro
        maxInstallmentNoInterest: noIntInstalQuantity,

        //Tipo da bandeira
        brand: bandeira,
        success: function (retorno) {
            $.each(retorno.installments, function (ia, obja) {
                $.each(obja, function (ib, objb) {

                    //Converter o preço para o formato real com JavaScript
                    var valorParcela = objb.installmentAmount.toFixed(2).replace(".", ",");

                    //Acrecentar duas casas decimais apos o ponto
                    var valorParcelaDouble = objb.installmentAmount.toFixed(2);
                    //Apresentar quantidade de parcelas e o valor das parcelas para o usuário no campo SELECT
                    $('#qntParcelas').show().append("<option value='" + objb.quantity + "' data-parcelas='" + valorParcelaDouble + "'>" + objb.quantity + " parcelas de R$ " + valorParcela + "</option>");
                });
            });
        },
        error: function (retorno) {
            // callback para chamadas que falharam.
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
        }
    });
}

//Enviar o valor parcela para o formulário
$('#qntParcelas').change(function () {
    $('#valorParcelas').val($('#qntParcelas').find(':selected').attr('data-parcelas'));
});

//Recuperar o token do cartão de crédito
$("#formPagamento").on("submit", function (event) {
    event.preventDefault();
    var paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    console.log(paymentMethod);
    PagSeguroDirectPayment.createCardToken({
        cardNumber: $('#numCartao').val(), // Número do cartão de crédito
        brand: $('#bandeiraCartao').val(), // Bandeira do cartão
        cvv: $('#cvvCartao').val(), // CVV do cartão
        expirationMonth: $('#mesValidade').val(), // Mês da expiração do cartão
        expirationYear: $('#anoValidade').val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
        success: function (retorno) {
            $('#tokenCartao').val(retorno.card.token);
            recupHashCartao();
        },
        error: function (retorno) {
            // Callback para chamadas que falharam.
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
        }
    });


});

//Recuperar o hash do cartão
function recupHashCartao() {
    PagSeguroDirectPayment.onSenderHashReady(function (retorno) {
        if (retorno.status == 'error') {
            console.log(retorno.message);
            return false;
        } else {
            $("#hashCartao").val(retorno.senderHash);
            var dados = $("#formPagamento").serialize();
            console.log(retorno.senderHash);
        }
    });
}

function getHash(){
   alert( PagSeguroDirectPayment.getSenderHash())
}


function createCardToken() {
    PagSeguroDirectPayment.createCardToken({
        cardNumber: $('#numCartao').val(), // Número do cartão de crédito
        brand: $('#bandeiraCartao').val(), // Bandeira do cartão
        cvv: $('#cvvCartao').val(), // CVV do cartão
        expirationMonth: $('#mesValidade').val(), // Mês da expiração do cartão
        expirationYear: $('#anoValidade').val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
        success: function (retorno) {
            $('#tokenCartao').val(retorno.card.token);
            console.log(retorno)
            getHash()
            recupHashCartao();
        },
        error: function (retorno) {
            console.log(retorno)
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
        }
    });
}