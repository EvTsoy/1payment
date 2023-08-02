<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FindRangeController extends AbstractController
{
    #[Route('/find_range', name: 'app_find_range')]
    public function index(): Response
    {
        return $this->render('find_range/index.html.twig');
    }
}
