<?php

namespace App\Repository\Article;

interface ArticleRepositoryInterface
{
    /**
     * @return \App\Entity\Article[]
     */
    public function findLatest(): iterable;
}
