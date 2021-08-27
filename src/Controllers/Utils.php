<?php


namespace Source\Controllers;


class Utils
{

    function format_date_to_sql($date){
        return substr($date,6,4).'-'.substr($date,3,2).'-'.substr($date,0,2);
    }


}