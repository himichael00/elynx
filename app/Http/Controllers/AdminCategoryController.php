<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('IsAdmin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'category_colors' => Color::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $validate_data = $request->validate([
            'category_title' => 'required|max:255',
            'slug' => 'required|unique:elynx_post_categories',
            'color' => 'required|max:50'
        ]);

        Category::create($validate_data);

        return redirect('/dashboard/categories')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit', [
            'categories' => $category,
            'category_colors' => Color::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        // validate data
        $rules = [
            'category_title' => 'required|max:255',
            'slug' => 'required|unique:elynx_post_categories',
            'color' => 'required|max:50'
        ];

        // check slug, if the new slug filled by the user is not the same as before that saved in database
        // do the validation again, which slug must be unique and required
        // if slug is the same then do nothing
        if ($request->slug != $category->slug) {
            $rules['slug'] ='required|unique:elynx_posts';
        }

        $validate_data = $request->validate($rules);

        // $validate_data['author_id'] = auth()->user()->id;

        Category::where('id', $category->id)->update($validate_data);

        return redirect('/dashboard/categories')->with('success', 'Categories Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->category_title);
        return response()->json(['slug' => $slug]);
    }
}
