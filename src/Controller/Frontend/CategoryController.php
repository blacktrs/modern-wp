<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\Routing\Annotation\Route;
use WP_Term;

#[Route(path: 'category.php', name: 'category')]
class CategoryController
{
    public function __invoke(Request $request): Response
    {
        /** @var WP_Term $category */
        $category = get_queried_object();

        return new Response(sprintf('category %s page', $category->name));
    }
}
