<?php
namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;

interface MediaServiceInterface
{
    public function create(Model $parentModel, $request): Model;

    public function update(Model $model,$request): bool|Model;

    public function delete(Model $model): bool;
}
