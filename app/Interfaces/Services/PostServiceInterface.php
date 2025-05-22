<?php
namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;

interface PostServiceInterface
{
    public function getAll($filters, $perPage, array $relations = null);

    public function getById($id): ?Model;

    public function create($request): Model;

    public function update(Model $model,$request): bool;

    public function delete(Model $model): bool;
}
