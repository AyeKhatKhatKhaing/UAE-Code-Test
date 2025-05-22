<?php
namespace App\Services;

use App\Models\Post;
use App\Models\Comment;
use App\DTOs\CommentListingFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Services\CommentServiceInterface;
use App\Interfaces\Repositories\CommentRepositoryInterface;

class CommentService implements CommentServiceInterface
{
    protected $repository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->repository = $commentRepository;
    }

    public function getAll(Post $post, $filters, $perPage, array $relations = null)
    {
        return $this->repository->getAll($post, $filters, $perPage, $relations);
    }

    public function getById($id): ?Model
    {
        
    }
    public function create(Post $post, $data): Model
    {
        $data['post_id'] = $post->id;
        return $this->repository->create($data);
    }

    public function update(Model $model, $data): bool
    {
        return $this->repository->update($model,$data);
    }

    public function delete(Model $model): bool
    {
        return $this->repository->delete($model);
    }

}
