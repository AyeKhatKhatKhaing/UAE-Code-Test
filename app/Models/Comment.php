<?php
namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'content',
    ];
    
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediaable');
    }
}
