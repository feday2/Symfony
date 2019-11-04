<?php

namespace App\Controller;

use App\Service\CollectionGetterServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author feday2 <feday2@gmail.com>
 */
class ArticleCategoryController extends AbstractController
{
    private $collectionGetterService;

    public function __construct(CollectionGetterServiceInterface $collectionGetterService)
    {
        $this->collectionGetterService = $collectionGetterService;
    }

    /**
     * @param int $id
     */
    public function getAll(): Response
    {
        $CategoryCollection = $this->collectionGetterService->getCollection();

        return $this->render('headerMenu.html.twig', [
            'categories' => $CategoryCollection,
        ]);
    }

    public function index(string $slug): Response
    {
        $collection = $this->collectionGetterService->getCollection(['slug' => $slug]);
        $category = $collection->getAll()[0];

        return $this->render('Article\category.html.twig', [
            'category' => $category,
        ]);
    }
}
