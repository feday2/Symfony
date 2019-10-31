<?php

namespace App\Service;

use App\Collection\CollectionInterface;

interface CollectionGetterServiceInterface
{
    public function getCollection(array $filter = null): CollectionInterface;
}