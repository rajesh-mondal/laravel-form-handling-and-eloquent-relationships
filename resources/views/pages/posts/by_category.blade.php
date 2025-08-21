@extends('layout.app')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">
                Posts in "{{ $category->name }}"
            </h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($posts as $post)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <!-- Post Image -->
                        <img src="{{ $post->image ?? 'https://placehold.co/480x200/png' }}" 
                             alt="{{ $post->title }}" 
                             class="w-full h-48 object-cover">

                        <!-- Post Details -->
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                                    {{ $category->name }}
                                </span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ str_word_count($post->content)/200 }} min read</span>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="text-blue-600 font-medium hover:text-blue-800 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">No posts available in this category.</p>
                @endforelse
            </div>
        </div>
        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
