@extends('layout.app')

@section('content')

<div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Posts --}}
    <div class="bg-white shadow rounded-lg p-4">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">All Posts</h2>
        <a href="{{ route('posts.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">+ Add Post</a>
      </div>

      @if($posts->count())
        <table class="w-full border-collapse">
          <thead>
            <tr class="bg-gray-100">
              <th class="p-2 text-left">#</th>
              <th class="p-2 text-left">Title</th>
              <th class="p-2 text-left">Category</th>
              <th class="p-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $i => $post)
              <tr class="border-b hover:bg-gray-50">
                <td class="p-2">{{ $posts->firstItem() + $i }}</td>
                <td class="p-2 font-medium">{{ $post->title }}</td>
                <td class="p-2 text-gray-600">{{ $post->category?->name }}</td>
                <td class="p-2">
                  <a href="{{ route('posts.edit', $post) }}" class="text-blue-600">Edit</a>
                  <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this post?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 ml-2">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-3">
          {{ $posts->appends(['categories_page' => request('categories_page')])->links() }}
        </div>
      @else
        <p>No posts found.</p>
      @endif
    </div>

    {{-- Categories --}}
    <div class="bg-white shadow rounded-lg p-4">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">All Categories</h2>
        <a href="{{ route('categories.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">+ Add Category</a>
      </div>

      @if($categories->count())
        <table class="w-full border-collapse">
          <thead>
            <tr class="bg-gray-100">
              <th class="p-2 text-left">#</th>
              <th class="p-2 text-left">Name</th>
              <th class="p-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $i => $category)
              <tr class="border-b hover:bg-gray-50">
                <td class="p-2">{{ $categories->firstItem() + $i }}</td>
                <td class="p-2 font-medium">{{ $category->name }}</td>
                <td class="p-2">
                  <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edit</a>
                  <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this category?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 ml-2">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-3">
          {{ $categories->appends(['posts_page' => request('posts_page')])->links() }}
        </div>
      @else
        <p>No categories found.</p>
      @endif
    </div>

  </div>
</div>

@endsection