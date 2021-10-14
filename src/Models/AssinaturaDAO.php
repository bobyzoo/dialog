<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class AssinaturaDAO extends DataLayer
{
    public function __construct()
    {
        parent::__construct("assinatura", ["usuario_id", "assinatura_data_final","assinatura_status"], "usuario_id", false);
    }

}