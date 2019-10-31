<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Collection\ArticleCollection;

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
        $article = (new ArticleCollection())->generateArticleWithId($id);

        return $this->render('Article\index.html.twig', [
            'article' => $article,
        ]);
    }
}
