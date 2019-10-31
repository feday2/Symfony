<?php

namespace App\Collection;

/**
 * @author feday2 <feday2@gmail.com>
 */
class NullCollection implements CollectionInterface
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        return [];
    }
}