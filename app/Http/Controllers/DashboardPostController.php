<?php

namespace App\Http\Controllers;

use App\Models\DashboardPost;
use App\Models\Post;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(DashboardPost $dashboardPost)
    {
        //
    }
}
