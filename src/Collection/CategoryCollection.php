<?php

namespace App\Collection;

use App\Entity\Category;

/**
 * @author feday2 <feday2@gmail.com>
 */
class CategoryCollection implements CollectionInterface, \IteratorAggregate
{
    private $categories;

    /**
     * @param array $articles
     */
    public function __construct(Category ...$categories)
    {
        $this->categories = $categories;
    }

    public function getAll(): array
    {
        return $this->categories;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }
}
