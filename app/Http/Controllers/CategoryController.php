<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Category::with(['childrenRecursive'])->where('parent_id', 0)->get('id')->toArray();
        // dd(Category::all()->toArray());
        $topLevelCategories = Category::with('childrenRecursive')->where('parent_id', 0)->get();
        // dd($topLevelCategories);
        $categories = Category::all();
        return view('admin.categories.index', compact('categories','topLevelCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = new Category;

        $category->name = ['en' => $request->name_en, 'ar' => $request->name];
        $category->description = ['en' => $request->description_en, 'ar' => $request->description];
        $category->parent_id = $request->parent_id;

        $category->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request,  $id)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'. $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = Category::find($id);

        $category->name = ['en' => $request->name_en, 'ar' => $request->name];
        $category->description = ['en' => $request->description_en, 'ar' => $request->description];
        $category->parent_id = $request->parent_idame;

        $category->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
