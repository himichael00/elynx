<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DashboardPost;
use Illuminate\Container\Attributes\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('author_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $store_data = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:elynx_posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        // validate author id before create post
        $store_data['author_id'] = auth()->user()->id;

        Post::create($store_data);

        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $dashboardPost)
    {
        return view('dashboard.posts.show', [
            'post' => $dashboardPost
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardPost $dashboardPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardPost $dashboardPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $dashboardPost)
    {
        Post::destroy($dashboardPost->id);

        return  redirect('/dashboard/posts')->with('success', 'Post Has Been Deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
