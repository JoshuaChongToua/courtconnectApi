<?php

namespace App\Controller;

use App\Repository\TerrainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TerrainController extends AbstractController
{
    #[Route('/api/getAllTerrains', name: 'app_terrain')]
    public function getAll(TerrainRepository $terrainRepository): Response
    {
        $terrain = $terrainRepository->findAll();

        return $this->json($terrain, 200, [], ['groups' => ['terrain']]);
    }
}
