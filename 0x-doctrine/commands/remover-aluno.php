<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();
    
    $id = $argv[1];
    /** @var Aluno $aluno */
    $aluno = $entityManager->getReference(Aluno::class, $id);

    $entityManager->remove($aluno);
    $entityManager->flush();
} catch (\Throwable $th) {
    echo $th->getMessage();
}