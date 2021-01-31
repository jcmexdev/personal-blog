<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <article class="w-full bg-center bg-cover h-80 @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url({{ $post->cover }});">
                    <div class="flex flex-col justify-center w-full h-full px-8 bg-black bg-opacity-50">
                        <h3 class="text-4xl font-bold leading-10 text-white">
                            <a href="{{ route('posts.show', $post) }}" class="leading-7">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <div class="mt-4">
                            @foreach ($post->tags as $tag)
                                <small>
                                    <a href="{{ route('posts.tag', $tag) }}"
                                        class="inline-block px-3 py-1 mr-2 text-white {{ $tag->color }} rounded-full">{{ $tag->name }}</a>
                                </small>
                            @endforeach
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
