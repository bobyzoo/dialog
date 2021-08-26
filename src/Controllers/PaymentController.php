<?php


namespace Source\Controllers;

use Source\Models\PaymentDAO;

class PaymentController
{

    public function payment($data){
        $PaymentDAO = new PaymentDAO();
        echo $PaymentDAO->init_session();
    }

}