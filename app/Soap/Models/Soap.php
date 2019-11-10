<?php

namespace App\Soap\Models;

use Illuminate\Support\Collection;

class Soap
{
    /**
     * @param mixed $data
     * @param string $attribute
     * @param string $operator
     * @param string $filter
     * @return Collection
     */
    public static function filter($data, $attribute, $operator = '=', $filter): Collection
    {
        return collect($data)
            ->where($attribute, $operator, $filter)
            ->filter();
    }
}
