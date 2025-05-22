<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Interfaces\Services\PostServiceInterface;
use App\Interfaces\Services\MediaServiceInterface;

class PostController extends Controller
{
    protected $service, $mediaService;
    public function __construct(private PostServiceInterface $postService, MediaServiceInterface $mediaService)
    {
        $this->service = $postService;
        $this->mediaService = $mediaService;
    }

    public function index(Request $request)
    {
        $filters = $request->all();
        $data    = $this->service->getAll($filters, $request->display, ['media']);
        return view('post.index', compact('data'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->service->create($request->except(['_token','media']));

        if($request->media) 
        {
            $this->mediaService->create($post, $request);

        }
        return redirect()->route('posts.index')->with('flash_message', 'Post added!');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $this->service->update($post, $request->except(['_token','media']));

        if ($request->media) {
            $this->mediaService->update($post, $request);
        }
        return redirect()->route('posts.index')->with('flash_message', 'Post updated!');
    }


    public function destroy(Post $post)
    {
        $this->service->delete($post);
        $this->mediaService->delete($post);

        return redirect()->route('posts.index')->with('flash_message', 'Post deleted!');
    }
}
