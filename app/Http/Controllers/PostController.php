<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'cover' => 'mimes:png,jpg,webp|max:4096',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        if ($request->hasFile('cover')) {
            $post->cover = $request->file('cover')->store('images/posts');
        }
        $post->category_id = $validatedData['category_id'];
        $post->save();
        flashy()->success('Category saved successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $post->increment('views');

        return view('pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('pages.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:11|max:255',
            'cover' => 'mimes:png,jpg,webp|max:4096',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];

        if ($request->hasFile('cover')) {
            // Delete previous cover image if it exists
            if ($post->cover) {
                Storage::delete($post->cover);
            }

            $post->cover = $request->file('cover')->store('images/posts');
        }

        $post->category_id = $validatedData['category_id'];
        $post->save();

        flashy()->success('Post updated successfully');
        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        }

        return redirect()->route('posts.index')->with('error', 'Failed to delete post.');
    }

    public function details(string $id)
    {
        $post = Post::find($id);

        return view('pages.posts.details', compact('post'));
    }
}
