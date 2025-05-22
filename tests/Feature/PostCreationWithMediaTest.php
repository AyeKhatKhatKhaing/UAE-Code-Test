<?php 

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostCreationWithMediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post_with_media_and_data_is_stored_correctly()
    {
        
        Storage::fake('public');

        $file = UploadedFile::fake()->image('post_image.jpg');

        $response = $this->post(route('posts.store'), [
            'title'   => 'Test Post',
            'content' => 'This is a test post.',
            'media'   => $file,
        ]);

        $response->assertStatus(302); 

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
        ]);

        $mediaUrl = '/storage/Medias/' . now()->format('Y-m-d_His') . '_post_image.jpg';

        $this->assertDatabaseHas('media', [
            'url'  => $mediaUrl,
            'type' => 'image',
        ]);

    }
}
