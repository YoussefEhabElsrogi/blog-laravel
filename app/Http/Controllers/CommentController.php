<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();

        Comment::create($validatedData);

        return back()->with('commentCreateStatus', 'Your comment published successfully');
    }
}
