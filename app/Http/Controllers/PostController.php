<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('categories')->get();
        // dd($posts);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(auth()->user()->name);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'summary' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        // dd($request->all());
        // dd($request->image);
        $post = new Post;
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $request->image;
            $post->image = $imageName;
        }
        $post->title = ['en' => $request->title_en, 'ar' => $request->title];
        $post->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
        $post->body = ['en' => htmlentities($request->body_en), 'ar' => htmlentities($request->body)];
        $post->author = auth()->user()->name;
        $post->save();
        $post->categories()->attach($request->category_id)  ;
        $post->tags()->attach($request->tag_id)  ;


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $post = Post::find($id);

        if($request->hasFile('image')){
            // dd($request->all());

            if(file_exists((public_path('images/'.$post->image))))
            {
                // File::delete((public_path('images/'.$post->image)));
                Storage::disk('public')->delete(public_path('images/'.$post->image));
            }
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->title = ['en' => $request->title_en, 'ar' => $request->title];
        $post->summary = ['en' => $request->summary_en, 'ar' => $request->summary];
        $post->body = ['en' => $request->body_en, 'ar' => htmlentities($request->body)];
        // dd(htmlentities($request->body_en));
        if ($request->category_id != null){
            $post->categories()->sync($request->category_id)  ;
        }
        if ($request->tag_id != null){
            $post->tags()->sync($request->tag_id)  ;
        }
        $post->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Post::find($id);
        $category->delete();
        return redirect()->back();
    }
}
