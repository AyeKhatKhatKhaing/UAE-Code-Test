<?php
namespace App\Models;

use App\Models\Media;
use App\Models\Comment;
use App\Builders\PostBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediaable');
    }

    public function newEloquentBuilder($query)
    {
        return new PostBuilder($query);
    }
}
