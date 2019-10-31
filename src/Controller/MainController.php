<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Collection\ArticleCollection;

/**
 * @author feday2 <feday2@gmail.com>
 */
class MainController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $collection = new ArticleCollection();

        return $this->render('main.html.twig', [
            'articles' => $collection,
        ]);
    }
}
