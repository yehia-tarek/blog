<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tag-list|tag-create|tag-edit|tag-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tag-create', ['only' => ['create','store']]);
         $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tag-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name  = ['en' => $request->name_en, 'ar' => $request->name];
        $tag->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag =  Tag::find($id);

        $tag->name  = ['en' => $request->name_en, 'ar' => $request->name];

        $tag->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag =  Tag::find($id);

        $tag->delete();

        return redirect()->back();
    }
}
