<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\MediaRepositoryInterface;
use App\Interfaces\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    protected $mediaRepository;

    public function __construct(Comment $comment, MediaRepositoryInterface $mediaRepository)
    {
        $this->model = $comment;
        $this->repository = $mediaRepository;

    }

    public function getAll(Post $post, $filters=null,$perPage=null,array $relations = null)
    {
        $query  = $this->model->query()->where('post_id', $post->id);
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
