<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;
class Tag extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $filable = ['name'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
