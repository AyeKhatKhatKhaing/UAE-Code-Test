<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;


class PostBuilder extends Builder
{
    public function search($value)
    {
        $this->where(function($query) use ($value) {
            $query->where('title',  'LIKE', "%$value%")
                ->orWhere('content','LIKE',"%$value%");
        });

        return $this;
    }

    public function filter($filters)
    {
        if (isset($filters['search'])) $this->search($filters['search']);

        return $this;
    }

}
