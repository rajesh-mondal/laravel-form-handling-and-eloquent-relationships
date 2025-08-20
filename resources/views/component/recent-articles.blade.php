<main class="lg:w-2/3">
    <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Recent Articles</h2>
    <div class="space-y-8">
        @foreach($posts as $post)
            <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col md:flex-row">
                <img src="{{ $post->image ?? 'https://placehold.co/480x200/png' }}" 
                     alt="{{ $post->title }}" 
                     class="md:w-1/3 h-48 md:h-auto object-cover">

                <div class="p-6 md:w-2/3">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                            {{ $post->category->name ?? 'Uncategorized' }}
                        </span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ str_word_count($post->content)/200 }} min read</span>
                    </div>

                    <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>

                    <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 150) }}</p>

                    <a href="{{ route('posts.show', $post->id) }}" 
                       class="text-blue-600 font-medium hover:text-blue-800 transition">
                        Read More
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        <a href="{{ route('posts.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
            Browse All Articles
        </a>
    </div>
</main>
