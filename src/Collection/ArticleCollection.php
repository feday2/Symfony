<?php

namespace App\Collection;

use App\Entity\Article;

/**
 * @author feday2 <feday2@gmail.com>
 */
class ArticleCollection implements CollectionInterface
{
    private $articles;
    private $newest;
    private $common = [];
    private $other = [];

    /**
     * @param array $articles
     */
    public function __construct(array $articles)
    {
        $this->isArticle($articles);
        $this->articles = $articles;
        $this->categorize();
    }

    /**
     * Check if in array only articles.
     *
     * @param array $articles
     */
    private function isArticle(array $articles): void
    {
        foreach ($articles as $article) {
            if (!$article instanceof Article) {
                throw new \Exception('Not instance of Article');
            }
        }
    }

    private function categorize(): void
    {
        $articles = $this->getSortedByPublishedTime();
        $this->newest = array_shift($articles);
        for ($i = 0; $i < +3; ++$i) {
            if (!empty($articles)) {
                $this->common[] = array_shift($articles);
            }
        }
        $this->other = $articles;
    }

    /**
     * @return array
     */
    public function getSortedByPublishedTime(): array
    {
        $articles = $this->articles;
        usort($articles, function ($a, $b) {
            return $a->getPublishedAt() <=> $b->getPublishedAt();
        });

        return array_reverse($articles);
    }

    /**
     * @return Article
     */
    public function getNewest(): Article
    {
        return $this->newest;
    }

    /**
     * @return array
     */
    public function getCommon(): array
    {
        return $this->common;
    }

    /**
     * @return array
     */
    public function getOther(): array
    {
        return $this->other;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->articles;
    }
}
