<?php

declare(strict_types=1);

namespace App\Controller\Rest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/dashboard')]
class JsonAdminController
{
    #[Route(path: '/{id}', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function response(Request $request, int $id): JsonResponse
    {
        return new JsonResponse(['value' => 'Rest Request', 'id' => $id, 'req' => $request->query->get('id')]);
    }

    #[Route(path: '/{id}', defaults: ['var1' => true], methods: ['GET'])]
    public function page(string $id, bool $var1): JsonResponse
    {
        return new JsonResponse(['message' => 'Page found', 'req' => $var1, 'id' => $id]);
    }
}
