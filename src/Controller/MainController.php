<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CollectionGetterServiceInterface;

/**
 * @author feday2 <feday2@gmail.com>
 */
class MainController extends AbstractController
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
     * @return Response
     */
    public function index(): Response
    {
        $collection = $this->collectionGetterService->getCollection();

        return $this->render('main.html.twig', [
            'articles' => $collection,
        ]);
    }
}
