<?php

namespace Source\Controllers;

use Source\Models\AssinaturaDAO;

class AssinaturaController
{



    public static function createAssinatura($usuario_id)
    {
        $functions_utils = new Utils();

        $AssinaturaDAO = new AssinaturaDAO();

        $AssinaturaDAO->usuario_id = $usuario_id;
        $AssinaturaDAO->assinatura_data_final = $functions_utils->format_date_to_sql(date('d/m/Y', strtotime("+1 month")));
        $AssinaturaDAO->assinatura_status = 1;
        $AssinaturaDAO->save();

        if ($AssinaturaDAO->fail()) {
            echo "0;" . $AssinaturaDAO->fail()->getMessage();
            return false;
        }
        return true;
    }

}