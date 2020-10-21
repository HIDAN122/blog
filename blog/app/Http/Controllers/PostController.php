<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        if($user) {

            $items = $user->posts;

            return view('posts.user_posts', compact('items'));
        }else {
            $items = Post::all();
            return view('posts.blog_page', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $post = Post::create($data);

        if ($post) {
            return redirect()->route('posts.index')
                ->with('Post create successfully');
        } else {
            return back()->with('Error create')
                ->withInput();
        }
    }

    public function show(Post $post)
    {
        return view('posts.details',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource sddsin storage.
     *
     * @param Post $post
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, PostRequest $request)
    {
        if ($post->update($request->validated())) {

            return redirect()
                ->route('posts.index')
                ->with(['success' => 'Save success']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $delPost = $post->delete();

        if ($delPost) {
            return redirect()
                ->route('posts.index')
                ->with(['success' => "Post number [$post->id] has been deleted"]);
        } else {
            return back()->withErrors(['error' => 'Error delete']);
        }
    }

    public function showAllPosts()
    {
        $posts = Post::all();

        return view('posts.all_posts',compact('posts'));
    }
}
