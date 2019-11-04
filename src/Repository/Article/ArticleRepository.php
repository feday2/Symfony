<?php

namespace App\Repository\Article;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class ArticleRepository extends ServiceEntityRepository implements ArticleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * {@inheritdoc}
     */
    public function findLatest(): iterable
    {
        $query = $this->createQueryBuilder('a')
            ->innerJoin('a.category', 'c')
            ->addSelect('c')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
        ;

        return $query->getResult();
    }
}
