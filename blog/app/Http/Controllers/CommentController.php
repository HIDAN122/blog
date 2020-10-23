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

        if ($user['is_admin'] == 1) {
            $comments = Comment::all();

            return view('comments.index', compact('comments','user'));
        } else {

            $comments = $user->comments;

            return view('comments.index', compact('comments','user'));
        }

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Comment $comment)
    {
        $user = auth()->user();

        if($user['is_admin'] == 1){
            return view('comments.edit',compact('comment'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Comment $comment
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Comment $comment, CommentRequest $request)
    {
        $user = auth()->user();
        if($user['is_admin'] == 1) {
            if ($comment->update($request->validated())) {

                return redirect()
                    ->route('comments.index')
                    ->with(['success' => 'Save success']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        if($user['is_admin'] == 1 ){
            $delComment = $comment->destroy();
            if ($delComment) {
                return redirect()
                    ->route('comments.index')
                    ->with(['success' => "Post number [$delComment->id] has been deleted"]);
            } else {
                return back()->withErrors(['error' => 'Error delete']);
            }
        }
    }
}
