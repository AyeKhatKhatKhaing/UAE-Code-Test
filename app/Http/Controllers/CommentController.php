<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Interfaces\Services\MediaServiceInterface;
use App\Interfaces\Services\CommentServiceInterface;

class CommentController extends Controller
{
    protected $service, $mediaService;
    public function __construct(private CommentServiceInterface $commentService, MediaServiceInterface $mediaService)
    {
        $this->service = $commentService;
        $this->mediaService = $mediaService;
    }

    public function index(Request $request, Post $post)
    {
        $filters = $request->all();
        $data    = $this->service->getAll($post, $filters, $request->display, ['media', 'post']);
        return view('comment.index', compact('data','post'));
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $comment = $this->service->create($post, $request->except(['_token','media']));

        if($request->media) 
        {
            $this->mediaService->create($comment, $request);

        }
        return redirect()->route('comments.index',$post)->with('flash_message', 'Comment added!');
    }

    public function destroy(Comment $comment)
    {
        $this->service->delete($comment);

        $this->mediaService->delete($comment);

        return redirect()->back()->with('flash_message', 'Comment deleted!');
    }
}
