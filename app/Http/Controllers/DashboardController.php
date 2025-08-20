<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class DashboardController extends Controller {
    public function dashboard() {
        $posts = Post::with( 'category' )
            ->latest()
            ->paginate( 5, ['*'], 'posts_page' );

        $categories = Category::latest()
            ->paginate( 5, ['*'], 'categories_page' );

        return view( 'admin.dashboard', compact( 'posts', 'categories' ) );
    }
}
