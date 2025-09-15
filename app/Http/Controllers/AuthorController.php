<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Author::with('posts')->get();
        return view('author.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
         $request->validate(
            [
                'name'=>'string|required',
                'title'=>'string|required',
                'content'=>'string|required',
            ]
        );

        $author=Author::create(
            [
                'name'=>$request->name,
            ]
        );

        $author->posts()->create(
            [
            'title'=>$request->title,
            'content'=>$request->content,
            ]
        );

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
