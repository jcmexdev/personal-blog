<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
            <article class="w-full bg-center bg-cover h-80 @if($loop->first) md:col-span-2 @endif"
                     style="background-image: url({{Storage::url($post->image->url)}});">
                <div class="flex flex-col justify-center w-full h-full px-8">
                    <div class="">
                        @foreach ($post->tags as $tag)
                        <a href="" class="inline-block h-6 px-3 bg- bg-{{$tag->color}}-600 text-white rounded-full">
                            {{$tag->name}}
                        </a>
                        @endforeach
                    </div>
                    <h3 class="text-4xl font-bold leading-8 text-white">
                        {{ $post->title }}
                    </h3>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
