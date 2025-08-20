<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller {
    public function home() {
        $posts = Post::with( 'category' )->latest()->get();
        return view( 'home', compact( 'posts' ) );
    }
}
