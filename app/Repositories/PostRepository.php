<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Interfaces\Repositories\MediaRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $mediaRepository;

    public function __construct(Post $post, MediaRepositoryInterface $mediaRepository)
    {
        $this->model = $post;
        $this->repository = $mediaRepository;

    }

    public function getAll($filters=null,$perPage=null,array $relations = null)
    {
        $query  = $this->model->query();
        if($relations) $query->with($relations);

        if($filters) $query->filter($filters);

        $query->latest();
        
        return $query->paginate($perPage ?: 10);
    }

    public function getById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);

    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

}
