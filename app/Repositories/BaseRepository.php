<?php

namespace App\Repositories;

class BaseRepository
{
    public function findObject($collection, $column, $value)
    {
        return $collection->where($column, $value)->first();
    }
}
