@foreach ($categories as $category)
<a href="{{ route('posts.category', $category) }}"
   class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
    {{ $category->name }}
</a>
@endforeach
