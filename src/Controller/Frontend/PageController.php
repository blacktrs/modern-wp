<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController
{
    #[Route(path: 'page.php', name: 'page')]
    public function page(): Response
    {
        return new Response('page is here');
    }
}
