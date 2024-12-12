<x-layout>
    {{-- store title from web routes --}}
    <x-slot:post_title>{{ $title }}</x-slot>

    <article class="py-5 max-w-screen-md">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $value['title'] }}</h2>

        <div class="text-base text-gray-500">
            <a href="#">{{ $value['author'] }}</a> | 1 January 2024
        </div>

        <p class="my-4 font-light">
            {{ $value['body'] }}
        </p>

        <a href="/posts" class="font-medium text-blue-500 hover:underline">Back To Post &laquo;</a>
    </article>
</x-layout>