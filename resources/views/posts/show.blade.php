<x-app-layout>
    @section('title', $post->title)
    @section('description', $post->extract)

    @section('fb_url', url()->current())
    @section('fb_type', 'article')
    @section('fb_title', $post->title)
    @section('fb_description', $post->extract)
    @section('fb_image', $post->cover)

    @section('tw_title', $post->title)
    @section('tw_description', $post->extract)
    @section('tw_image', $post->cover)
        <div class="p-0 w-100 bg-cover bg-center" style="background-image: url({{ $post->cover }}); height: 70vh;">
            <div class="bg-black bg-opacity-50 w-full h-full flex flex-col justify-center px-4 md:px-16">
                <h1 class="text-4xl font-bold text-white mb-4 text-center">{{ $post->title }}</h1>
                <div class="text-lg text-white mb-4">
                    {{ $post->extract }}
                </div>
                <div class="inline-block">
                    @foreach ($post->tags as $tag)
                        <small>
                            <a href="{{ route('posts.tag', $tag) }}"
                                class="inline-block px-3 py-1 mr-2 text-white {{ $tag->color }} rounded-full">{{ $tag->name }}</a>
                        </small>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container py-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 px-2 md:px-0">
                {{-- Content --}}
                <article class="lg:col-span-2 bg-white post shadow-2xl rounded-lg">
                    <div class="text-base text-gray-500 px-4 pb-2 md:px-8">
                        <h1 class="text-4xl font-bold mb-4 mt-0">{{ $post->title }}</h1>
                        {!! $post->body !!}
                    </div>
                </article>
                {{-- Related --}}
                <aside>
                    <h3 class="mb-4 text-2xl font-bold text-gray-600">
                        Más en {{ $post->category->name }}
                    </h3>
                    <ul>
                        @foreach ($related as $post)
                            <li class="mb-4">
                                <a class="flex items-center bg-white rounded shadow-lg overflow-hidden"
                                    href="{{ route('posts.show', $post) }}">
                                    <img class="object-cover object-center h-28 w-40" src="{{ $post->cover }}"
                                        alt="{{ $post->title }}">
                                    <span class="ml-2 text-gray-600 text-lg">{{ $post->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
    </x-app-layout>
