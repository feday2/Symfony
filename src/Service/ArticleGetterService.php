<?php

namespace App\Service;

use App\Collection\ArticleCollection;
use App\Collection\CollectionInterface;
use App\Collection\NullCollection;
use App\Entity\Article;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleGetterService implements CollectionGetterServiceInterface
{
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository = $em->getRepository(Article::class);
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
            if (null === $article) {
                throw new NotFoundHttpException('Article not found');
            }

            return new ArticleCollection($article);
        }

        return new NullCollection();
    }
}
