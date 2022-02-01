<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Telefone
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $numero;

    #[ORM\ManyToOne(targetEntity: Aluno::class)]
    private Aluno $aluno;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }


    public function setAluno(Aluno $aluno): void
    {
        $this->aluno = $aluno;
    }
}