<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Comments\ProductComment;
use App\Shop\Comments\Comment;
use App\Shop\Comments\Requests\AddCommentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    private $comments;

    /**
     * CommentController constructor.
     * @param $comments
     */
    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param AddCommentsRequest $request
     * @param ProductComment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(AddCommentsRequest $request, ProductComment $comment)
    {
        $comment->create($request->all());

        return Redirect::back();

    }

    /**
     * @param Request $request
     * @param ProductComment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateComment(Request $request, ProductComment $comment)
    {
        $comment->update($request);

        return Redirect::back();
    }

}
