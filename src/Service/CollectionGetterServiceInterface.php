<?php

namespace App\Service;

use App\Collection\CollectionInterface;

interface CollectionGetterServiceInterface
{
    /**
     * Get collection of all entities or use filter array
     * where key = name of entity property, value = value
     * of property.
     *
     * @param array $filter
     *
     * @return CollectionInterface
     */
    public function getCollection(array $filter = null): CollectionInterface;
}
