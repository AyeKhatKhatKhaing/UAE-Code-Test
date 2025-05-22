<?php
namespace App\Services;

use App\Interfaces\Repositories\MediaRepositoryInterface;
use App\Interfaces\Services\MediaServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaService implements MediaServiceInterface
{
    protected $repository;

    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->repository = $mediaRepository;
    }
    public function create(Model $parentModel, $request): Model
    {
        $data = $this->getData($request);
        return $this->repository->create($parentModel, $data);
    }

    public function update(Model $model, $request): bool | Model
    {
        $data = $this->getData($request);
        $request->hasFile('media') && $this->updateOrDeleteMedia($model?->media?->url);
        return $this->repository->update($model, $data);
    }

    public function delete(Model $model): bool
    {
        $this->updateOrDeleteMedia($model?->media?->url);
        return $this->repository->delete($model);
    }

    protected function getData($request): array
    {
        $mediaData = $request->except(['_method', '_token', 'title', 'content']);
        $data      = [];
        if ($request->hasFile('media')) {
            $file         = $request->file('media');
            $originalName = $file->getClientOriginalName();
            $timestamp    = now()->format('Y-m-d_His');
            $filename     = $timestamp . '_' . $originalName;

            $path = $file->storeAs('public/Medias', $filename);

            $data['url']  = Storage::url($path);
            $data['type'] = explode('/', $file->getMimeType())[0];
        }

        return $data;
    }

    protected function updateOrDeleteMedia($filePath)
    {
        if (! $filePath) {
            return;
        }
        $filePath = str_replace('/storage/', 'public/', $filePath);

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}
