<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $items = Post::all();
//        $categories = Category::all();
        $categories = Category::where('parent_id','!=','0')->get();
        $mainCategories = Category::where('parent_id','==','0')->get();
        return view('posts.blog_page', compact('items', 'categories','mainCategories'));
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
    public function store(Post $post)
    {
        $post['user_id'] = auth()->user()->id;

        if ($post) {
            return redirect()->route('posts.index', [$post->id])
                ->with('Пост створено успішно');
        } else {
            return back()->with('Помилка створення')
                ->withInput();
        }
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post)
    {
            return redirect()
                ->route('posts.edit', $post->id)
                ->with(['success' => 'Успішно збережено']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if ($post) {
            return redirect()
                ->route('posts.index')
                ->with(['success' => "Пост номер [$post->id] видалений"]);
        } else {
            return back()->withErrors(['msg' => 'Помилка видалення']);
        }
    }
}
