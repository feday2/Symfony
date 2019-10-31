<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ArticleGeneratorService;

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
        $collection = (new ArticleGeneratorService())->getCollection();
        dump($collection);
        return $this->render('main.html.twig', [
            'articles' => $collection,
        ]);
    }
}
