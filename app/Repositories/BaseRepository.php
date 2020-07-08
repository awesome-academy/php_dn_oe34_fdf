<?php

namespace App\Repositories;

use Exception;
use Log;

class BaseRepository
{
    public function findObject($collection, $column, $value)
    {
        return $collection->where($column, $value)->first();
    }

    public function listAll($query, $limits, $search, $searchKey)
    {
        if (!empty($search) && !empty($searchKey)) {
            $query = $query->search($search, $searchKey);
        }

        return $query->orderByDesc('created_at')->paginate($limits);
    }

    public function update($object, $params)
    {
        try {
            $object->update($params);

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }

    public function store($query, $params)
    {
        try {
            $query->create($params);

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }

    public function destroy($object)
    {
        try {
            $object->delete();

            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
