<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Interfaces\Repositories\MediaRepositoryInterface;

class MediaRepository implements MediaRepositoryInterface
{
    public function __construct(Media $media)
    {
        $this->model = $media;
    }
    public function create(Model $parentModel ,array $data): Model
    {
        return $parentModel->media()->create($data);
    }

    public function update(Model $model, array $data): bool|Model
    {
        return $model->media? $model->media->update($data):$model->media()->create($data);
    }

    public function delete(Model $model): bool
    {
        return $model->media? $model->media->delete() : false;
    }

}
