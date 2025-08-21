<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-xl font-bold mb-4 text-gray-800">Categories</h3>
    <div class="space-y-2">
        @foreach($categories as $category)
            <a href="{{ route('category.posts', $category->id) }}" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                <span class="text-gray-700">{{ $category->name }}</span>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                    {{ $category->posts->count() }}
                </span>
            </a>
        @endforeach
    </div>
</div>
