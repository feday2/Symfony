<?php

namespace App\Controller;

use App\Service\CollectionGetterServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author feday2 <feday2@gmail.com>
 */
class ArticleController extends AbstractController
{
    private $collectionGetterService;

    public function __construct(CollectionGetterServiceInterface $collectionGetterService)
    {
        $this->collectionGetterService = $collectionGetterService;
    }

    public function index(int $id): Response
    {
        $collection = $this->collectionGetterService->getCollection(['id' => $id]);
        $article = $collection->getAll()[0];

        return $this->render('Article\index.html.twig', [
            'article' => $article,
        ]);
    }
}
