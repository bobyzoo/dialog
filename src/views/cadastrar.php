<?php


//require dirname(__FILE__)."/../_autoload.class.php";
use CWG\PagSeguro\PagSeguroAssinaturas;

$email = "gabrieldossantosvargas@gmail.com";
$token = "9E1F2091C37B4C789CBBCF321C078B97";
$sandbox = true;

$pagseguro = new PagSeguroAssinaturas($email, $token, $sandbox);

$js = $pagseguro->preparaCheckoutTransparente(true);
echo $js['completo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DialogPsi - Crie sua conta</title>

    <!-- Latest compiled and minified CSS -->

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= url("assets/vendors/owl-carousel-2/owl.carousel.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/owl-carousel-2/owl.theme.default.min.css") ?>">


    <link rel="stylesheet" href="<?= url("assets/vendors/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/flag-icon-css/css/flag-icon.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/ti-icons/css/themify-icons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/typicons/typicons.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/css/vendor.bundle.base.css") ?>">

    <link rel="stylesheet" href="<?= url("assets/vendors/select2/select2.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/vendors/icheck/all.css") ?>">
    <link rel="stylesheet" href="<?= url("assets/bootstrap-datepicker/bootstrap-datepicker.min.css") ?>">

    <link rel="stylesheet" href="<?= url("assets/css/shared/style.css") ?>">
    <link rel="shortcut icon" href="<?= url("assets/images/favicon.png") ?>"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
          integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .hide {
            display: none;
        }
    </style>
</head>
<body class="dark-theme">
<div id="modal">
    <div class="modal fade" id="modalRemote" tabindex="-1" role="dialog" data-backdrop="static"
         aria-labelledby="modalRemoteLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRemoteLabel">Selecione uma das opções</h5>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="container text-center mb-3">
                        <button class="btn btn-lg btn-outline-primary" onclick="cadastrarPsicologo()">Cadastrar como
                            psicologo
                        </button>
                    </div>
                    <div class="container text-center ">
                        <button class="btn btn-lg btn-outline-primary" onclick="cadastrarPaciente()">Cadastrar como
                            paciente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_form_psicologo" class="container hide">
    <div class="py-5 text-center">
        <h2>Cadastrar</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Checkout</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Plano Basico</h6>
                        <small class="text-muted">cobrança automatica mensal</small>
                    </div>
                    <span class="text-muted">R$ 67,00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>R$ 67,00</strong>
                </li>
            </ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Código promocional">
                    <button type="submit" class="btn btn-secondary">Resgatar</button>
                </div>
            </form>
        </div>

        <div class="col-md-7 col-lg-8">
            <form class="needs-validation" novalidate="">
                <h4 class="mb-3">Dados do Psicologo</h4>
                <div class="row g-3">

                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="usuario" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Senha *</label>
                        <input type="password" class="form-control" id="senha" placeholder=""required="">
                        <div class="invalid-feedback">
                            Insira a Senha.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Insira um email válido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usu_data_nascimento" class="form-label">Data de nascimento*</label>
                        <div id="datepicker-popup" class="input-group date datepicker">
                            <input type="text" class="form-control" id="usu_data_nascimento" name="usu_data_nascimento"
                                   required>
                            <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usu_telefone" class="form-label">Telefone</label>
                        <input type="text" name="usu_telefone" id="usu_telefone" placeholder="(99) 99999-99999"
                               class="form-control input_fone">
                    </div>
                    <div class="mb-3">
                        <label for="usu_telefone" class="form-label">CRP</label>
                        <input type="text" name="usu_telefone" id="usu_telefone" placeholder="999-999"
                               class="form-control input_fone">
                    </div>

                    <hr class="my-4">
                    <!--Local da cobrança-->
                    <h4 class="mb-3">Local da cobrança</h4>


                    <div class="col-md-3">
                        <label for="cep" class="form-label">CEP *</label>
                        <input type="text" class="form-control" id="cep" placeholder="" required=""
                               onblur="pesquisacep(this.value);">
                        <div class="invalid-feedback">
                            Informe o CEP
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="cep" class="form-label">Estado (UF)*</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="" required=""
                               maxlength="2">
                        <div class="invalid-feedback">
                            Informe a estado
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="cep" class="form-label">Cidade *</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" required="">
                        <div class="invalid-feedback">
                            Informe a cidade
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Rua * </label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="1234 Main St"
                               required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Bairro *</label>
                        <input type="text" class="form-control" name="bairro" id="bairro"
                               placeholder="">
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Número *</label>
                        <input type="text" class="form-control" id="numero" placeholder="">
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">Complemento *</label>
                        <input type="text" class="form-control" id="complemento" placeholder="Casa/Apartamento">
                    </div>
                </div>

                <hr class="my-4">
                <h4 class="mb-3">Pagamento</h4>
                <div class="row gy-3">
                    <div class="col-md-6">
                        <label for="cc-name" class="form-label">Nome proprietario do cartão</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Nome escrito no cartão</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="numCartao" class="form-label">Número do cartão</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="numCartao" placeholder="" required=""
                                   maxlength="16">
                            <div class="input-group-prepend">
                                    <span class="input-group-text bandeira-cartao creditCard">
                                    </span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-expiration" class="form-label">Vencimento</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required=""
                               maxlength="4">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-cvv" class="form-label">Código de segurança (CSC)</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="" maxlength="4">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017–2021 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<div class="col-lg-4 mx-auto hide" id="div_form_paciente">
    <h2 class="text-center mb-4 pt-5">Cadastro</h2>
    <div class="container mt-5">
        <form id="FrmCadastroUsuario" method="post" action="<?= url_pesquisa("setCadastro") ?>">
            <div class="mb-3">
                <label for="usu_email" class="form-label">Email*</label>
                <input type="email" class="form-control" name="usu_email" id="usu_email"
                       required>
            </div>
            <div class="mb-3">
                <label for="usu_login" class="form-label">Usuario*</label>
                <input type="text" class="form-control" name="usu_login" id="usu_login"
                       required>
            </div>
            <div class="mb-3">
                <label for="usu_password" class="form-label">Senha*</label>
                <input type="password" class="form-control" name="usu_password"
                       id="usu_password" required>
            </div>
            <div class="mb-3">
                <label for="usu_password" class="form-label">Nome*</label>
                <input type="text" name="usu_nome" id="usu_nome" class="form-control"
                       required>
            </div>
            <div class="mb-3">
                <label for="usu_data_nascimento" class="form-label">Data de nascimento*</label>
                <div id="datepicker-popup" class="input-group date datepicker">
                    <input type="text" class="form-control" id="usu_data_nascimento" name="usu_data_nascimento"
                           required>
                    <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="usu_telefone" class="form-label">Telefone</label>
                <input type="text" name="usu_telefone" id="usu_telefone" placeholder="(99) 99999-99999"
                       class="form-control input_fone">
            </div>
            <div class="mb-3">
                <label for="usu_telefone" class="form-label">Nome de contato para
                    emergencia*</label>
                <input type="text" class="form-control"
                       id="pac_nome_contato_emergencia"
                       name="pac_nome_contato_emergencia">
            </div>
            <div class="mb-3">
                <label for="usu_telefone" class="form-label usu_telefone">Telefone
                    de emergencia*</label>
                <input type="text" class="form-control input_fone"
                       name="pac_telefone_contato_emergencia" placeholder="(99) 99999-99999"
                       id="pac_telefone_contato_emergencia">
            </div>
            <div class="mb-3">
                <label for="usu_telefone" class="form-label">Codigo de ativação*</label>
                <input type="text" class="form-control" name="psi_codigo_ativacao"
                       id="psi_codigo_ativacao"
                       value="<?= $codigo_ativacao != "novo" ? $codigo_ativacao : "" ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Register</button>
            </div>
            <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Já tem uma conta ?</span>
                <a href="login.html" class="text-black text-small">Login</a>
            </div>
        </form>
    </div>
</div>
<script src="<?= url("assets/vendors/js/vendor.bundle.base.js") ?>"></script>
<script src="<?= url("assets/vendors/jquery-validation/jquery.validate.min.js") ?>"></script>
<script src="<?= url("assets/js/jquery.mask.js") ?>"></script>
<script src="<?= url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js") ?>"></script>
<script>
    $('.input_fone').mask('(99) 99999-9999');
    $('#cc-expiration').mask('99/99');
    $('#cc-cvv').mask('9999');
    $('#numCartao').mask('9999 9999 9999 9999');
    if ($("#datepicker-popup").length) {
        $('#datepicker-popup').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
        });
    }

</script>
<script src="<?= url("assets/js/shared/off-canvas.js") ?>"></script>
<script src="<?= url("assets/js/shared/hoverable-collapse.js") ?>"></script>
<script src="<?= url("assets/js/shared/misc.js") ?>"></script>
<script src="<?= url("assets/js/shared/settings.js") ?>"></script>
<script src="<?= url("assets/js/shared/todolist.js") ?>"></script>
<script src="<?= url("assets/js/shared/st-wizard.js") ?>"></script>
<script src="<?= url("assets/js/Utils.js") ?>"></script>
<script src="<?= url("assets/js/shared/form-validation.js") ?>"></script>
<script>
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('estado').value = "...";
                $("#estado")

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    }

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('estado').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            console.log(conteudo)
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

</script>
<script>
    <?= $codigo_ativacao == "novo" ? "showModal('modalRemote');" : "" ?>
    <?= $codigo_ativacao != "novo" ? "showDiv('div_form_paciente');" : "" ?>

    $('#numCartao').keyup(function () {
        //Receber o número do cartão digitado pelo usuário
        var numCartao = $(this).val().trim();
        numCartao = numCartao.replace(/\s/g, '');
        console.log(numCartao)
        var qntNumero = numCartao.length;
        //Validar o cartão quando o usuário digitar 6 digitos do cartão
        if (qntNumero == 6) {
            //Instanciar a API do PagSeguro para validar o cartão
            PagSeguroDirectPayment.getBrand({
                cardBin: numCartao,
                success: function (retorno) {
                    console.log(retorno)
                    $('#msg').empty();

                    //Enviar para o index a imagem da bandeira
                    var imgBand = retorno.brand.name;
                    $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgBand + ".png'>");
                    $('#bandeiraCartao').val(imgBand);
                    recupParcelas(imgBand);
                },
                error: function (retorno) {
                    console.log(retorno)

                    //Enviar para o index a mensagem de erro
                    $('.bandeira-cartao').empty();
                    $('#msg').html("Cartão inválido");
                }
            });
        }
    });

    function cadastrarPaciente() {
        hideModal('modalRemote');
        showDiv('div_form_paciente');
    }

    function cadastrarPsicologo() {
        hideModal('modalRemote');
        showDiv('div_form_psicologo');
    }

    function changeUserType() {
        console.log(document.querySelector('input[name="usuario_tipo"]:checked').value)
        if (document.querySelector('input[name="usuario_tipo"]:checked').value == "psicologo") {
            hideDiv("content-paciente-step-2")
            showDiv("content-psicologo-step-2")
        } else {
            hideDiv("content-psicologo-step-2")
            showDiv("content-paciente-step-2")
        }
    }

    $("#FrmCadastroUsuario").validate({
        rules: {
            usu_login: "required",
            usu_nome: "required",
            psi_numero_crp: "required",
            usu_data_nascimento: "required",
            pac_nome_contato_emergencia: "required",
            pac_telefone_contato_emergencia: "required",
            psi_codigo_ativacao: "required",
            usu_password: {
                required: true,
                minlength: 5,
                maxlength: 15,
            },
            usu_email: {
                required: true,
                email: true
            }
        },
        messages: {
            usu_email: "Insira o email",
            usu_login: "Insira o login",
            usu_nome: "Insira o seu nome",
            psi_numero_crp: "Insira o seu numero de CRP",
            usu_data_nascimento: "Insira sua data de nascimento",
            pac_nome_contato_emergencia: "Insira um nome para contato de emergencia",
            pac_telefone_contato_emergencia: "Insira o numero do contato de emergencia",
            psi_codigo_ativacao: "Insira o codigo de ativação do psicólogo",
            usu_password: {
                required: "Insira a senha",
                minlength: "Sua senha deve ter no minimo 5 caracteres",
                maxlength: "Sua senha deve ter no maximo 15 caracteres"
            },
        },
        errorPlacement: function (label, element) {
            label.addClass('mt-2 text-danger');
            label.insertAfter(element);
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-danger')
            $(element).addClass('form-control-danger')
        },
        submitHandler: function (form, event) {
            var form = $(form);
            event.preventDefault();
            $.ajax({
                type: form.attr('method'),
                data: form.serialize(),
                url: form.attr('action'),
                success: function (data) {
                    console.log(data)
                    if (data == "1") {
                        showToast("Sucesso!", data.split(';')[1])
                        window.location.href = "<?=url_pesquisa("")?>"
                    } else {
                        showToast("Error", data.split(';')[1], "bg-danger")
                    }
                }
            });
        }
    });

</script>
<script src="<?= url("assets/vendors/select2/select2.min.js") ?>"></script>
<script>
    if ($(".js-example-basic-single").length) {
        $(".js-example-basic-single").select2();
    }
</script>
</body>
</html>