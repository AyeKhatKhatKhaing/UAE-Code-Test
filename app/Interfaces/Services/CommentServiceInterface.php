<?php
namespace App\Interfaces\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

interface CommentServiceInterface
{
    public function getAll(Post $post ,$filters, $perPage, array $relations = null);

    public function getById($id): ?Model;

    public function create(Post $post,$request): Model;

    public function update(Model $model,$request): bool;

    public function delete(Model $model): bool;
}
