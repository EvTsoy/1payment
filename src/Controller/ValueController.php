<?php

namespace App\Controller;

use App\Repository\ValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValueController extends AbstractController
{
    #[Route('/check-value/{value}', methods: 'GET')]
    public function index($value, ValueRepository $valueRepository): Response
    {
        $rangeId = null;

        $range = $valueRepository->findIdOfRange((int) str_pad($value, 19, 0, STR_PAD_RIGHT));
        if ($range) {
            $rangeId = $range->getId();
        }

        return new JsonResponse([
            'rangeId' => $rangeId
        ]);
    }
}
