<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'url', 
        'type', 
        'mediaable_id', 
        'mediaable_type'
    ];

    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }
}
