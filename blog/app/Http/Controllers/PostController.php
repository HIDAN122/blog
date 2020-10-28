<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        if ($user['is_admin'] == 1) {
            $items = Post::paginate(15);
            return view('posts.user_posts', compact('items'));
        }
        if ($user) {
            $items = $user->posts()->paginate(10);

            return view('posts.user_posts', compact('items'));
        } else {
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
                ->with(['success' => 'Post create successfully']);
        } else {
            return back()->with('Error create')
                ->withInput();
        }
    }

    public function show(Post $post)
    {
        return view('posts.details', compact('post'));
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
     * @param Post $post
     * @return bool
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function showAllPosts()
    {
        $posts = Post::paginate(10);

        return view('posts.all_posts', compact('posts'));
    }
}
