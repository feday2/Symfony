<?php

namespace App\Controller;

use App\Service\CollectionGetterServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author feday2 <feday2@gmail.com>
 */
class MainController extends AbstractController
{
    private $collectionGetterService;

    public function __construct(CollectionGetterServiceInterface $collectionGetterService)
    {
        $this->collectionGetterService = $collectionGetterService;
    }

    public function index(): Response
    {
        $collection = $this->collectionGetterService->getCollection();

        return $this->render('main.html.twig', [
            'articles' => $collection,
        ]);
    }
}
