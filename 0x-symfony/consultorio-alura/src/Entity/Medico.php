<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[Orm\Entity]
class Medico
{
    #[Orm\Id]
    #[Orm\GeneratedValue()]
    #[Orm\Column(type: "integer")]
    public int $id;

    #[Orm\Column(type: "integer")]
    public int $crm;

    #[Orm\Column(type: "string")]
    public string $nome;

    public function __construct(int $crm, string $nome) {
        $this->crm = $crm;
        $this->nome = $nome;
    }
}