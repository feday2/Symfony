<?php

namespace App\Controller;

use App\Service\CollectionGetterServiceInterface;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        try {
            $collection = $this->collectionGetterService->getCollection(['slug' => $slug]);
            $category = $collection->first();
        } catch (EntityNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return $this->render('Article\category.html.twig', [
            'category' => $category,
        ]);
    }
}
