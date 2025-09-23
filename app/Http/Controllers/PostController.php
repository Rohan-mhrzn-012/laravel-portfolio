<?php

namespace App\Http\Controllers;
use App\Models\Post; 
use App\Models\User; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.create_post', compact('users'));
    }

    public function withPosts()
    {
        $upost = User::with('posts')->get();
        return view('users.user_post', compact('upost'));
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'user_id' => $request->user_id,
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('users.user_post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
