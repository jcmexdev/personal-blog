<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->title }}</h1>

        <div class="mb-2 text-lg text-gray-500">
            {{ $post->extract }}
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- Content --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="object-cover object-center w-full h-80" src="{{ Storage::url($post->cover) }}"
                         alt="">
                </figure>
                <div class="mt-4 text-base text-gray-500 md:p-2 lg:p-3.5">
                    {{ $post->body }}
                </div>
            </div>
            {{-- Related --}}
            <aside>
                <h3 class="mb-4 text-2xl font-bold text-gray-600">
                    Más en {{ $post->category->name }}
                </h3>
                <ul>
                    @foreach ($related as $post)
                    <li class="mb-4">
                        <a class="flex items-center" href="{{ route('posts.show', $post)}}">
                            <img class="object-cover object-center h-20 w-36"
                                 src="{{ Storage::url($post->cover)}}"
                                 alt="">
                            <span class="ml-2 text-gray-600">{{ $post->title }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
