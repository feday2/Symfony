<?php

namespace App\Service;

use App\Collection\CollectionInterface;
use App\Collection\ArticleCollection;
use App\Collection\NullCollection;
use App\Entity\Article;
use Faker\Factory;

class ArticleGeneratorService implements CollectionGetterServiceInterface
{
    /**
     * @param array $filter
     *
     * @return CollectionInterface
     */
    public function getCollection(array $filter = null): CollectionInterface
    {
        if (null === $filter) {
            return $this->generate(15);
        }
        if (!empty($filter['id'])) {
            return $this->generateArticleWithId($filter['id']);
        }

        return new NullCollection();
    }

    /**
     * Generate random articles.
     *
     * @return array
     */
    private function generate(int $count): ArticleCollection
    {
        $faker = Factory::create();
        $articles = [];
        for ($i = 0; $i < $count; ++$i) {
            $articles[] = new Article(
                $faker->numberBetween(1, 100),
                $faker->name,
                $faker->text,
                $faker->imageUrl(640, 480),
                $faker->DateTime('now'));
        }
        $articleCollection = new ArticleCollection($articles);

        return $articleCollection;
    }

    /**
     * @param int $id
     *
     * @return Article
     */
    private function generateArticleWithId(int $id): ArticleCollection
    {
        $faker = Factory::create();
        $article = new Article(
            $id,
            $faker->name,
            $faker->text,
            $faker->imageUrl(640, 480),
            $faker->DateTime('now'));

        return new ArticleCollection([$article]);
    }
}
