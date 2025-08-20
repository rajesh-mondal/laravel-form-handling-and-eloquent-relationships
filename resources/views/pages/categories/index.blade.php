@extends('layout.app')

@section('content')

<div class="max-w-5xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">All Categories</h2>
        <a href="{{ route('categories.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Add Category
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
                    <th class="p-3 border-b">Name</th>
                    <th class="p-3 border-b">Slug</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border-b">
                            {{ $categories->firstItem() + $index }}
                        </td>
                        <td class="p-3 border-b">{{ $category->name }}</td>
                        <td class="p-3 border-b">{{ $category->slug }}</td>
                        <td class="p-3 border-b flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" 
                                  method="POST" onsubmit="return confirm('Delete this category?')">
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
        {{ $categories->links() }}
    </div>
</div>

@endsection