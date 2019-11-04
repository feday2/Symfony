<?php

namespace App\Service;

use App\Collection\ArticleFakeCollection;
use App\Collection\CollectionInterface;
use App\Collection\NullCollection;
use App\Model\Article;
use Faker\Factory;

class ArticleGeneratorService implements CollectionGetterServiceInterface
{
    /**
     * @param array $filter
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
     */
    private function generate(int $count): CollectionInterface
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
        $articleCollection = new ArticleFakeCollection(...$articles);

        return $articleCollection;
    }

    private function generateArticleWithId(int $id): CollectionInterface
    {
        $faker = Factory::create();
        $article = new Article(
            $id,
            $faker->name,
            $faker->text,
            $faker->imageUrl(640, 480),
            $faker->DateTime('now'));

        return new ArticleFakeCollection($article);
    }
}
