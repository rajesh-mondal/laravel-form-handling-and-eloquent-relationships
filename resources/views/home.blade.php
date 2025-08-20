@extends('layout.app')

@section('content')
   @include('component.hero')
   @include('component.feature')
   <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
        {{-- Recent Articles --}}
        @include('component.recent-articles')
        {{-- Sidebar --}}
        <aside class="lg:w-1/3 space-y-8">
            {{-- About Widget --}}
            @include('component.about-widget')
            {{-- Categories Widget --}}
            @include('component.categories-widget')
            {{-- Newsletter Widget --}}
            @include('component.newsletter-widget')
        </aside>
   </div>
@endsection