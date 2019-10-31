<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ArticleGeneratorService;

/**
 * @author feday2 <feday2@gmail.com>
 */
class ArticleController extends AbstractController
{
    /**
     * @param int $id
     *
     * @return Response
     */
    public function index(int $id): Response
    {
        $collection = (new ArticleGeneratorService())->getCollection(['id' => $id]);
        $article = $collection->getAll()[0];
        return $this->render('Article\index.html.twig', [
            'article' => $article,
        ]);
    }
}
