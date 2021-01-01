<x-app-layout>
    <div class="p-4 mx-auto md:p-6 lg:p-8 max-w-7xl">
        <h1 class="mb-4 text-3xl font-bold text-center uppercase">Tag: {{ $tag->name }}</h1>
        <div class="grid grid-cols-1 gap-4 md:gap-6 md:grid-cols-2">
            @foreach ($posts as $post)
            <x-post-card :post="$post"></x-post-card>
            @endforeach
        </div>
        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
