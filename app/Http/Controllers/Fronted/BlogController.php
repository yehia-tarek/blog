<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $category = request()->query('category');
        $tag = request()->query('tag');

        if ($category === null && $tag === null) {
            // If neither category nor tag is specified, get all posts
            $posts = Post::all();
        } elseif ($tag !== null) {
            // If a tag is specified, filter posts by tag
            $posts = Post::with('tags')
                ->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tag_id', $tag);
                })
                ->get();
        } elseif ($category !== null) {
            // If a category is specified, filter posts by category
            $posts = Post::with('categories')
                ->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category);
                })
                ->get();
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('fronted.index', compact('categories', 'tags', 'posts'));
    }

    public function show ($id) {
        $category = request()->query('category');
        $tag = request()->query('tag');

        if ($category === null && $tag === null) {
            // If neither category nor tag is specified, get all posts
            $posts = Post::all();
        } elseif ($tag !== null) {
            // If a tag is specified, filter posts by tag
            $posts = Post::with('tags')
                ->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tag_id', $tag);
                })
                ->get();
        } elseif ($category !== null) {
            // If a category is specified, filter posts by category
            $posts = Post::with('categories')
                ->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category);
                })
                ->get();
        }

        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::with('tags')->find($id);
        return view('fronted.single_post', compact('post', 'categories', 'tags', 'posts'));
    }

}
