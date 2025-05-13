@props([
  'group',
  'category' => null,
  'label'
])

@php
  
  $params = ['group' => $group];
  if ($category) {
    $params['category'] = $category;
  }
@endphp

<a
  href="{{ route('products.index', $params) }}"
  {{ $attributes->merge(['class' => 'block px-4 py-2 hover:bg-gray-100']) }}
>
  {{ $label }}
</a>