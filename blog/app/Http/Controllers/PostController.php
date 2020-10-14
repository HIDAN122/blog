<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = auth()->user();

        $items = $user->posts;

        return back()->with(compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $item = new Post();

        return back()->with(compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $item = Post::create($data);

        if($item){
            return redirect()->route('posts.index',[$item->id])
                ->with('Пост створено успішно');
        }else{
            return back()->with('Помилка створення')
                ->withInput();
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {

        $item = Post::findorFail($id);
        $accountList = Post::all();

        return back()->with(compact('item', 'accountList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $item = Post::find($id);
        if ($item) {
            $data = $request->all();
            $item->update($data);

            return redirect()
                ->route('posts.edit', $item->id)
                ->with(['success' => 'Успішно збережено']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = Post::destroy($id);

        if ($result) {
            return redirect()
                ->route('posts.index')
                ->with(['success' => "Пост номер[$id] видалений"]);
        } else {
            return back()->withErrors(['Помилка видалення']);
        }
    }
}
