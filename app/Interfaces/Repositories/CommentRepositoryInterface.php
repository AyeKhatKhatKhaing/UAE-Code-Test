<?php

namespace App\Interfaces\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

interface CommentRepositoryInterface
{
    public function getAll(Post $post, $filters=null,$perPage=null,array $relations = null);

    public function getById($id): ?Model;

    public function create(array $data): Model;

    public function update(Model $model, array $data): bool;

    public function delete(Model $model): bool;
}
