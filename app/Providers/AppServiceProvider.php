<?php

namespace App\Providers;

use App\Services\PostService;
use App\Services\MediaService;
use App\Services\CommentService;
use App\Repositories\PostRepository;
use App\Repositories\MediaRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\PostServiceInterface;
use App\Interfaces\Services\MediaServiceInterface;
use App\Interfaces\Services\CommentServiceInterface;
use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Interfaces\Repositories\MediaRepositoryInterface;
use App\Interfaces\Repositories\CommentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(PostServiceInterface::class, PostService::class);

        $this->app->singleton(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->singleton(MediaServiceInterface::class, MediaService::class);

        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->singleton(CommentServiceInterface::class, CommentService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
