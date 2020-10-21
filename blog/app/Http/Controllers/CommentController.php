<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $user = auth()->user();


        $posts = $user->posts;

        $comments = $user->comments;

        return view('comments.index',compact('comments','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|
     * @return \Illuminate\View\View
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = \Auth::id();

        $comments = Comment::create($data);

        if ($comments) {
            return redirect()->route('posts.show', [$data['post_id']])
                ->with('Comment add successfully');
        } else {
            return back()->withErrors('Error add')
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
