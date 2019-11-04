<?php

namespace App\Service;

use App\Collection\CategoryCollection;
use App\Collection\CollectionInterface;
use App\Collection\NullCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class CategoryGetterService implements CollectionGetterServiceInterface
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
            return new CategoryCollection(...$this->repository->findAll());
        }
        if (!empty($filter['slug'])) {
            $category = $this->repository->findOneBy([
                'slug' => $filter['slug'],
            ]);

            return new CategoryCollection($category);
        }

        return new NullCollection();
    }
}
