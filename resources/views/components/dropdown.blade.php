@props(['title', 'items'])

<li class="relative group">
    <button class="px-4 py-2 w-full text-left bg-gray-800 text-white rounded-md">
        {{ $title }}
    </button>

    <!-- Styled dropdown with items in their own row -->
    <div class="absolute left-0 top-full hidden group-hover:block group-focus-within:block bg-gray-700 p-2 mt-1 w-48 rounded-md z-10">
        <ul class="space-y-2"> <!-- Adds space between each row -->
            @foreach ($items as $item)
                <li>
                    <x-nav-link href="{{ $item['href'] }}" class="block px-4 py-2 bg-gray-600 hover:bg-gray-500 rounded-md">
                        {{ $item['label'] }}
                    </x-nav-link>
                </li>
            @endforeach
        </ul>
    </div>
</li>