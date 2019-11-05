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
    public function __construct(Article ...$articles)
    {
        $this->articles = $articles;
        $this->categorize();
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

    public function getSortedByPublishedTime(): array
    {
        $articles = $this->articles;
        usort($articles, function ($a, $b) {
            return $a->getPublishedAt() <=> $b->getPublishedAt();
        });

        return array_reverse($articles);
    }

    public function getNewest(): Article
    {
        return $this->newest;
    }

    public function getCommon(): array
    {
        return $this->common;
    }

    public function getOther(): array
    {
        return $this->other;
    }

    public function getAll(): array
    {
        return $this->articles;
    }
}
