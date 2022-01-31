<?php

namespace App\Helper;

use App\Entity\Medico;

class MedicoBuilder
{
    public function make(string $json): Medico
    {
        $body = json_decode($json);

        return new Medico($body->crm, $body->nome);
    }
}
