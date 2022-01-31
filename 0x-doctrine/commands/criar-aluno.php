<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $aluno = new Aluno();
    $aluno->setNome($argv[1]);

    $entityManagerFactory = new EntityManagerFactory();
    $entityManager = $entityManagerFactory->getEntityManager();

    $entityManager->persist($aluno);
    $entityManager->flush();
} catch (\Throwable $th) {
    echo $th->getMessage();
}