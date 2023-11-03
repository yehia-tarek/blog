<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'description'];
    protected $filable = ['name', 'description', 'parent_id'];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childs() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive() {
        return $this->childs()->with('childrenRecursive');
    }

    // public function posts() {
    //     return $this->hasManyThrough(Post::class, Category::class, 'parent_id', 'category_id', 'id');
    // }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

}
