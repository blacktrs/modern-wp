<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route(path: 'front-page.php', name: 'index')]
    public function index(Request $request): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route(path: '404.php', name: 'not_found')]
    public function notFound(Request $request): Response
    {
        return new Response('page not found', Response::HTTP_NOT_FOUND);
    }
}
