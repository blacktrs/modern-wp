<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'category.php', name: 'category')]
class CategoryController
{
    public function __invoke(Request $request): Response
    {
        return new Response(sprintf('category %s page', get_queried_object()->name));
    }
}
