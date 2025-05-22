<?php
namespace Tests\Unit\Services;

use Mockery;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Media;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Repositories\MediaRepositoryInterface;

class MediaServiceTest extends TestCase
{
    protected $mediaRepositoryMock;
    protected $mediaService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mediaRepositoryMock = Mockery::mock(MediaRepositoryInterface::class);
        $this->mediaService        = new MediaService($this->mediaRepositoryMock);

        Storage::fake('public');
    }

    /** @test */
    public function test_creates_media_and_associates_with_post()
    {
        $post     = Post::factory()->make(); 
        $post->id = 1;                       

        $file = UploadedFile::fake()->image('photo.jpg');

        $request = new Request();
        $request->files->set('media', $file);

        $this->mediaRepositoryMock
            ->shouldReceive('create')
            ->once()
            ->withArgs(function ($model, $data) use ($post) {
                if ($model !== $post) {
                    return false;
                }
                return isset($data['url']) && isset($data['type']);
            })
            ->andReturn(new Media(['url' => '/storage/Medias/fake_photo.jpg', 'type' => 'image']));

        $media = $this->mediaService->create($post, $request);

        $this->assertInstanceOf(Media::class, $media);
        $this->assertStringContainsString('storage/Medias', $media->url);
        $this->assertEquals('image', $media->type);
    }

    public function test_creates_media_and_associates_with_comment()
    {
        $comment     = Comment::factory()->make();
        $comment->id = 1;

        $file = UploadedFile::fake()->image('comment_photo.jpg');

        $request = new Request();
        $request->files->set('media', $file);

        $this->mediaRepositoryMock
            ->shouldReceive('create')
            ->once()
            ->withArgs(function ($model, $data) use ($comment) {
                return $model === $comment
                && isset($data['url'])
                && isset($data['type']);
            })
            ->andReturn(new Media(['url' => '/storage/Medias/comment_photo.jpg', 'type' => 'image']));

        $media = $this->mediaService->create($comment, $request);

        $this->assertInstanceOf(Media::class, $media);
        $this->assertStringContainsString('storage/Medias', $media->url);
        $this->assertEquals('image', $media->type);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
