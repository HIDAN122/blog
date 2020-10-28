<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentEditRequest;
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
            $comments = Comment::paginate(5);

            return view('comments.index', compact('comments', 'user'));
        } else {

            $comments = $user->comments()->paginate(10);

            return view('comments.index', compact('comments', 'user'));
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

            return view('comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Comment $comment
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Comment $comment, CommentEditRequest $request)
    {
        $user = auth()->user();
        if ($user) {
            if ($comment->update($request->validated())) {
                return redirect()
                    ->route('comments.index')
                    ->with(['success' => 'Comment update successful']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return bool
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        if ($user) {
            if ($comment->delete()) {
                return true;
            } else {
                return false;
            }
        }
    }


}
