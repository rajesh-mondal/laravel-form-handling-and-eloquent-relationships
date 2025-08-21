<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller {
    public function home() {
        $posts = Post::with( 'category' )->latest()->limit(5)->get();
        $categories = Category::all();
        return view( 'home', compact( 'posts', 'categories' ) );
    }
}
