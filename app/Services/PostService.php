<?php
namespace App\Services;

use App\Models\Post;
use App\DTOs\PostListingFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Services\PostServiceInterface;
use App\Interfaces\Repositories\PostRepositoryInterface;

class PostService implements PostServiceInterface
{
    protected $repository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repository = $postRepository;
    }

    public function getAll($filters, $perPage, array $relations = null)
    {
        return $this->repository->getAll($filters, $perPage, $relations);
    }

    public function getById($id): ?Model
    {
        
    }
    public function create($data): Model
    {
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
