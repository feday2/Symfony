<?php

namespace App\Service;

use App\Collection\ArticleCollection;
use App\Collection\CollectionInterface;
use App\Collection\NullCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ArticleGetterService implements CollectionGetterServiceInterface
{
    private $repository;

    public function __construct(ServiceEntityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filter
     */
    public function getCollection(array $filter = null): CollectionInterface
    {
        if (null === $filter) {
            return new ArticleCollection(...$this->repository->findAll());
        }
        if (!empty($filter['id'])) {
            $article = $this->repository->findOneById($filter['id']);

            return new ArticleCollection($article);
        }

        return new NullCollection();
    }
}
