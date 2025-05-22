<?php
namespace App\Observers;

use App\Models\Post;
use App\Interfaces\Services\MediaServiceInterface;

class PostObserver
{
    protected $mediaService;
    public function __construct( MediaServiceInterface $mediaService)
    {
        $this->mediaService = $mediaService;
    }
    /**
     * Handle the Post "deleting" event.
     */
    public function deleting(Post $post)
    {
        $post->comments->each(function ($comment) {
            if ($comment->media) {
                $this->mediaService->delete($comment);
            }
        });
    }
}
