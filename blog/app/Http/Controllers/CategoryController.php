<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class   CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $items = Category::all();

        return view('categories.index',compact('items'));

    }

    public function getPostByCategoryId(Category $id)
    {
        $items = Post::query()->where('category_id', '=', $id->id)->paginate();

        return view('posts.user_posts',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Category $category)
    {

        if ($category) {
            return redirect()->route('categories.index', [$category->id])
                ->with('Категорію створено  успішно');
        } else {
            return back()->with('Помилка створення')
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category)
    {
        return redirect()
                ->route('categories.edit', $category->id)
                ->with(['success' => 'Успішно збережено']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category) {
            return redirect()
                ->route('categories.index')
                ->with(['success' => "Категорія номер[$category->id] видалена"]);
        } else {
            return back()->withErrors(['msg' => 'Помилка видалення']);
        }

    }
}
