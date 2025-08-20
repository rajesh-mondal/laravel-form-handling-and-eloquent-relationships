@extends('layout.app')

@section('content')

<div class="max-w-6xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">All Posts</h2>
        <a href="{{ route('posts.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Add Post
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b">#</th>
                    <th class="p-3 border-b">Title</th>
                    <th class="p-3 border-b">Category</th>
                    <th class="p-3 border-b">Content</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border-b">
                            {{ $posts->firstItem() + $index }}
                        </td>
                        <td class="p-3 border-b font-semibold">{{ $post->title }}</td>
                        <td class="p-3 border-b text-gray-600">{{ $post->category->name }}</td>
                        <td class="p-3 border-b text-gray-500">
                            {{ Str::limit($post->content, 60) }}
                        </td>
                        <td class="p-3 border-b flex gap-2">
                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" 
                                  method="POST" onsubmit="return confirm('Delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-4">
        {{ $posts->links() }}
    </div>
</div>

@endsection