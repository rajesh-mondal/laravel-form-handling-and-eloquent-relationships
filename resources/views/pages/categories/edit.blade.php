@extends('layout.app')

@section('content')

<div class="max-w-lg mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                   class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" placeholder="Category Name">
            @error('name') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-1 text-gray-700">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" 
                   class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" placeholder="Category Slug">
            @error('slug') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('categories.index') }}" 
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