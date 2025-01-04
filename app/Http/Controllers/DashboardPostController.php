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
        $validate_data = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:elynx_posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        // validate author id before create post
        $validate_data['author_id'] = auth()->user()->id;

        Post::create($validate_data);

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
    public function edit(Post $dashboardPost)
    {
        return view('dashboard.posts.edit', [
            'post' => $dashboardPost,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $dashboardPost)
    {
        // validate data
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // check slug, if the new slug filled by the user is not the same as before that saved in database
        // do the validation again, which slug must be unique and required
        // if slug is the same then do nothing
        if ($request->slug != $dashboardPost->slug) {
            $rules['slug'] ='required|unique:elynx_posts';
        }

        $validate_data = $request->validate($rules);

        $validate_data['author_id'] = auth()->user()->id;

        Post::where('id', $dashboardPost->id)->update($validate_data);

        return redirect('/dashboard/posts')->with('success', 'Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $dashboardPost)
    {
        Post::destroy($dashboardPost->id);

        return redirect('/dashboard/posts')->with('success', 'Post Has Been Deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
