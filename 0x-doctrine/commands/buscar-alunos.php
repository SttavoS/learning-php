<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();

    $alunoRepo = $entityManager->getRepository(Aluno::class);

    /** @var Aluno[] $alunos */
    $alunos =  $alunoRepo->findAll();

    foreach ($alunos as $aluno) {
        echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}