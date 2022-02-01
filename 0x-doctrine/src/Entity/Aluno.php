<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Aluno
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $nome;

    #[ORM\OneToMany(targetEntity: Telefone::class, mappedBy: Aluno::class)]
    private Collection $telefones;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();    
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function addTelefone(Telefone $telefone): void
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }
}