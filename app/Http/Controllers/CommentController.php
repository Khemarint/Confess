<?php

namespace App\Http\Controllers;

use App\Models\Brain;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Brain $brain){

        $comment = new Comment();
        $comment->brain_id = $brain->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get("content");
        $comment->save();

        return redirect()->route('brain.show',$brain->id)->with('success','Comment posted successfully!');
    }
}
