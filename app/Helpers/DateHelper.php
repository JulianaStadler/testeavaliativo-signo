<?php

namespace App\Helpers;

class DateHelper
{
    public static function situacaoEnquete($inicio, $fim)
    {
        $hoje = date('Y-m-d');
        if ($fim < $hoje) {
            return "Finalizada";
        } elseif ($inicio > $hoje) {
            return "Não iniciada";
        } else {
            return "Em andamento";
        }
    }
}