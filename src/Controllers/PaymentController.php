<?php


namespace Source\Controllers;

use CWG\PagSeguro\PagSeguroAssinaturas;
use Source\Models\PaymentDAO;

class PaymentController
{

    public function payment($data)
    {
        $PaymentDAO = new PaymentDAO();
        echo $PaymentDAO->init_session();
    }

    public function checkout($data)
    {
        $pagseguro = new PagSeguroAssinaturas(EMAIL_PAGSEGURO, TOKEN_PAGSEGURO, ENVIRONMENT_SANDBOX_PAGEGURO);

        //Nome do comprador igual a como esta no CARTÂO
        $pagseguro->setNomeCliente($data['usu_nome']);
        //Email do comprovador
        $pagseguro->setEmailCliente($data['usu_email']);
        //Informa o telefone DD e número
        $data['ddd'] = substr($data['usu_telefone'],1,2);
        $data['fone'] = substr(substr($data['usu_telefone'],5,14),0,5).substr(substr($data['usu_telefone'],5,14),7,4);
        $pagseguro->setTelefone($data['ddd'], $data['fone']);
        //Informa o CPF
        $data['usu_cpf'] = $this->limpaCPF_CNPJ($data['usu_cpf']);
        $pagseguro->setCPF($data['usu_cpf']);
        //Informa o endereço RUA, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO, CEP
        $pagseguro->setEnderecoCliente($data['rua'], $data['numero'], $data['complemento'], $data['bairro'], $data['cidade'], $data['estado'], $data['cep']);
        //Informa o ano de nascimento
        $pagseguro->setNascimentoCliente($data['usu_data_nascimento']);
        //Infora o Hash  gerado na etapa anterior (assinando.php), é obrigatório para comunicação com checkoutr transparente
        $pagseguro->setHashCliente($data['pagseguro_cliente_hash_form']);
        //Informa o Token do Cartão de Crédito gerado na etapa anterior (assinando.php)
        $pagseguro->setTokenCartao($data['pagseguro_cartao_token']);
        //Código usado pelo vendedor para identificar qual é a compra
        $pagseguro->setReferencia("BAS".rand(0,100000));
        //Plano usado (Esse código é criado durante a criação do plano)
        $pagseguro->setPlanoCode(CODIGO_PACOTE_PASICO_ASSINATURA_PAGSEGURO);
        //No ambiente de testes funciona normalmente sem o IP, no ambiente "real", mesmo na documentação falando que é opcional, precisei passar o IP ($_SERVER['HTTP_CLIENT_IP'];) do cliente para finalizar corretamente a assinatura
        // https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/360001810594-Pagamento-Recorrente-Cancelado- (o erro e a solução encontrada)
        $pagseguro->setIPCliente('127.0.0.1');

        try{
            $codigo = $pagseguro->assinaPlano();
            echo '1;';
        } catch (Exception $e) {
            echo "0;".$e->getMessage();
        }

    }

    function limpaCPF_CNPJ($valor){
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }

}