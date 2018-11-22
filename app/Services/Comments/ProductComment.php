<?php

namespace App\Services\Comments;

use App\Shop\Comments\Comment;

class ProductComment
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * ProductComment constructor.
     * @param $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param $data
     */
    public function create($data)
    {
        $this->comment->fill($data);
        $this->comment->save();
    }

    /**
     * @param $request
     */
    public function update($request)
    {
        $comment = $this->comment->where('id', $request->id)->first();
        $comment->likes_counter = $request->likes_counter;
        $comment->save();
    }

}
