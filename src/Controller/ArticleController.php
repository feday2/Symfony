<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CollectionGetterServiceInterface;

/**
 * @author feday2 <feday2@gmail.com>
 */
class ArticleController extends AbstractController
{
    private $collectionGetterService;

    /**
     * @param CollectionGetterServiceInterface $collectionGetterService
     */
    public function __construct(CollectionGetterServiceInterface $collectionGetterService)
    {
        $this->collectionGetterService = $collectionGetterService;
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function index(int $id): Response
    {
        $collection = $this->collectionGetterService->getCollection(['id' => $id]);
        $article = $collection->getAll()[0];

        return $this->render('Article\index.html.twig', [
            'article' => $article,
        ]);
    }
}
