<?php

namespace App\Collection;

/**
 * @author feday2 <feday2@gmail.com>
 */
class NullCollection implements CollectionInterface
{
    public function getAll(): array
    {
        return [];
    }
}
