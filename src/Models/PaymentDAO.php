<?php


namespace Source\Models;


class PaymentDAO
{
    private $url;
    private $token;
    private $post;

    private function curls($action)
    {
        $ch = curl_init($this->url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);

        $xml = simplexml_load_string($data);
        $json = json_encode($xml);
        return $json;
    }

    public function init_session(){
        $this->url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=".EMAIL_PAGSEGURO."&token=".TOKEN_PAGSEGURO;
        return $this->curls("teste");

    }


}