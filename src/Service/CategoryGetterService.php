<?php

namespace App\Service;

use App\Collection\CategoryCollection;
use App\Collection\CollectionInterface;
use App\Collection\NullCollection;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;

class CategoryGetterService implements CollectionGetterServiceInterface
{
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository = $em->getRepository(Category::class);
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
            if (null === $category) {
                throw new NotFoundHttpException('Category not found');
            }

            return new CategoryCollection($category);
        }

        return new NullCollection();
    }
}
