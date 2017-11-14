<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store (Request $request, $gallery_id) {
        $request->validate(
            [
                'content' => 'required | max:1000'
            ]
        );
        $gallery = Gallery::find($galley_id);
        Comment::create([
            'content' => $request->get('content'),
            'gallery_id' => $gallery->id,
            'user_id' => Auth::user()->id,
        ]);
    }
}
