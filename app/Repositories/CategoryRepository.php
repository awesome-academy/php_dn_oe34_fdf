<?php

namespace App\Repositories;

class CategoryRepository extends BaseRepository
{
    public function exceptParent($query)
    {
        return $query->where('name', '!=', 'Food')->where('name', '!=', 'Drink');
    }

    public function exceptChild($query)
    {
        return $query->where('name', 'Food')->orWhere('name', 'Drink');
    }
}
