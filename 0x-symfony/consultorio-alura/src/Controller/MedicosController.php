<?php

namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Helper\MedicoBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicosController extends AbstractController
{
    private $entityManager;
    private $medicoBuilder;

    public function __construct(EntityManagerInterface $entityManager, MedicoBuilder $medicoBuilder) 
    {
        $this->entityManager = $entityManager;
        $this->medicoBuilder = $medicoBuilder;
    }

    #[Route('/medicos', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $medicoRepo = $doctrine->getRepository(Medico::class);

        $medicos = $medicoRepo->findAll();

        return new JsonResponse($medicos, Response::HTTP_OK);
    }

    #[Route('/medicos', methods: ['POST'])]
    public function store(Request $request): Response
    {
        $medico = $this->medicoBuilder->make($request->getContent());

        $this->entityManager->persist($medico);
        $this->entityManager->flush();

        return new JsonResponse($medico, Response::HTTP_CREATED);
    }

    #[Route('/medicos/{id}', methods: ['GET'])]
    public function show(int $id, ManagerRegistry $doctrine): Response
    {
        $medicoRepo = $doctrine->getRepository(Medico::class);

        $medico = $medicoRepo->find($id);

        if (!$medico) {
            return new JsonResponse("Medico não encontrado", Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($medico, Response::HTTP_OK);
    }

    #[Route('/medicos/{id}', methods: ['PUT'])]
    public function update(int $id, Request $request)
    {
        $medico = $this->medicoBuilder->make($request->getContent());
        $medicoExistente = $this->entityManager->find(Medico::class, $id);

        if (is_null($medicoExistente)) {
            return new JsonResponse("Medico não encontrado", Response::HTTP_NOT_FOUND);
        }

        $medicoExistente->crm = $medico->crm;
        $medicoExistente->nome = $medico->nome;

        $this->entityManager->flush();

        return new JsonResponse($medicoExistente, Response::HTTP_OK);
    }

    #[Route('/medicos/{id}', methods: ['DELETE'])]
    public function delete(int $id)
    {
        $medico = $this->entityManager->find(Medico::class, $id);

        if (!$medico) {
            return new JsonResponse("Medico não encontrado", Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($medico);
        $this->entityManager->flush();

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
