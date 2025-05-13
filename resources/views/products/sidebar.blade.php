<aside class="hidden lg:block">
  <h4 class="font-semibold mb-2">Categories</h4>
  <ul class="space-y-1 text-sm">
    @foreach($groups as $group)
      <li>
        <a href="{{ route('products.index',['group'=>$group]) }}"
           class="block px-2 py-1 rounded hover:bg-gray-100
                  {{ $currentGroup==$group ? 'bg-gray-200' : '' }}">
          {{ ucfirst($group) }}
        </a>
      </li>
    @endforeach
  </ul>
</aside>