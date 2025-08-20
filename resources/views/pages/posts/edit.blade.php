@extends('layout.app')

@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                   class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
            @error('title') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-1 text-gray-700">Content</label>
            <textarea name="content" rows="5"
                      class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">{{ old('content', $post->content) }}</textarea>
            @error('content') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-1 text-gray-700">Category</label>
            <select name="category_id" class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('posts.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

@endsection