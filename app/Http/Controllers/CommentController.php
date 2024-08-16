<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request)
    {

        $request->validate([
            'body' => 'required|max:255'
        ]);

        $this->comment->body        = $request->body;
        $this->comment->user_id     = Auth::user()->id;
        $this->comment->post_id     = $request->post_id;
        $this->comment->save();

        return redirect()->back();
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return back();
    }
}
