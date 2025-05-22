<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
    public function getAll($filters=null,$perPage=null,array $relations = null);

    public function getById($id): ?Model;

    public function create(array $data): Model;

    public function update(Model $model, array $data): bool;

    public function delete(Model $model): bool;
}
