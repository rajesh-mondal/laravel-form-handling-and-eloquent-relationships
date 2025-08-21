<nav class="hidden md:flex space-x-8 items-center">
    <a href="./index.html" class="text-blue-600 font-medium">Home</a>
    
    <!-- Categories Dropdown -->
    <div class="relative desktop-dropdown">
        <button id="dropdownButton" 
                class="text-gray-600 hover:text-blue-600 py-4 transition flex items-center">
            Categories
            <i class="fas fa-chevron-down ml-1 text-sm"></i>
        </button>
        <div id="dropdownMenu" 
             class="absolute left-0 w-64 bg-white rounded-md shadow-lg hidden z-50">
            {{-- <div class="py-2">
                @foreach ($categories as $category)
                    <a href="{{ route('category.posts', $category->id) }}" 
                       class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div> --}}
        </div>
    </div>
    <a href="#" class="text-gray-600 hover:text-blue-600 transition">About</a>
    <a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const button = document.getElementById("dropdownButton");
        const menu = document.getElementById("dropdownMenu");

        button.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        // Optional: close dropdown if clicked outside
        document.addEventListener("click", (e) => {
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add("hidden");
            }
        });
    });
</script>
