@props(['post'])

<article class="overflow-hidden bg-white rounded-lg shadow-lg">
    <img class="object-cover object-center w-full h-40 sm:h-52 md:h-64 lg:h-72"
         src="{{ $post->cover }}"
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
                <a href="{{ route('posts.tag', $tag) }}"
                   class="inline-block px-3 py-1 mr-2 text-white {{$tag->color}} rounded-full">{{$tag->name }}</a>
            </small>
            @endforeach
        </div>
    </div>
</article>
