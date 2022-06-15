<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class BlogPostController extends Controller
{
    public function show() {
        return BlogPost::all();
    }

    #[ArrayShape(['success' => "mixed"])] public function create() {
        \request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $success = BlogPost::create([
            'title' => \request('title'),
            'content' => \request('content'),
        ]);
        return [
            'success' => $success
        ];
    }

    #[ArrayShape(['success' => "bool"])] public function update(BlogPost $post) {
        \request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $success = $post->update([
            'title' => \request('title'),
            'content' => \request('content'),
        ]);
        return [
            'success' => $success
        ];
    }

    #[ArrayShape(['success' => "bool|null"])] public function delete(BlogPost $post) {
        $success = $post->delete();
        return [
            'success' => $success
        ];
    }
}
