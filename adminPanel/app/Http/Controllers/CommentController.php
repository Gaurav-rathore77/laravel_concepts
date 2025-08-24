<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller {
    public function store(Request $request, Post $post) {
        $request->validate(['body' => 'required']);
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);
        return back()->with('success', 'Comment added');
    }
}

