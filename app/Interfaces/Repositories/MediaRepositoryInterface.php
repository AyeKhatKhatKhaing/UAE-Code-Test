<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Model;

interface MediaRepositoryInterface
{
    public function create(Model $parentModel, array $data): Model;

    public function update(Model $model, array $data): bool|Model;

    public function delete(Model $model): bool;
}
