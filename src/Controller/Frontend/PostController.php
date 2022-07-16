<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Entity\WpPosts as Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route(path: 'single-post.php', name: 'single-post')]
    public function singlePost(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entityRepository = $entityManager->getRepository(Post::class);

        $post = $entityRepository->find(1);

        return $this->render('post.html.twig', ['post' => $post]);
    }
}
