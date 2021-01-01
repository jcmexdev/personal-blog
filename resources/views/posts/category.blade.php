<x-app-layout>
    <div class="p-4 mx-auto md:p-6 lg:p-8 max-w-7xl">
        <h1 class="mb-4 text-3xl font-bold text-center uppercase">Categoría: {{ $category->name }}</h1>
        <div class="grid grid-cols-1 gap-4 md:gap-6 md:grid-cols-2">
            @foreach ($posts as $post)
            <article class="overflow-hidden bg-white rounded-lg shadow-lg">
                <img class="object-cover object-center w-full h-40 sm:h-52 md:h-64 lg:h-72"
                     src="{{ Storage::url($post->image->url) }}"
                     alt="">
                <div class="p-4">
                    <h2 class="text-xl font-bold">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="my-2 text-base text-gray-500">
                        {{ $post->extract }}
                    </p>
                    <div>
                        @foreach ($post->tags as $tag)
                        <small>
                            <a href=""
                               class="inline-block px-3 py-1 mr-2 text-gray-700 bg-gray-200 rounded-full">{{$tag->name }}</a>
                        </small>
                        @endforeach
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
