<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $id = $argv[1];
    $novoNome = $argv[2];
    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();
    
    /** @var Aluno $aluno */
    $aluno =  $entityManager->find(Aluno::class, $id);
    $aluno->setNome($novoNome);

    $entityManager->flush();

    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
} catch (\Throwable $th) {
    echo $th->getMessage();
}