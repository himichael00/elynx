<x-layout>
    {{-- store title from web routes --}}
    <x-slot:title>{{ $title }}</x-slot>

    @foreach ($posts as $value)
    <article class="py-5 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{ $value['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $value['title'] }}</h2>
        </a>

        <div class="text-base text-gray-500">
            <a href="#">{{ $value['author'] }}</a> | 1 January 2024
        </div>

        <p class="my-4 font-light">
            {{ Str::limit($value['body'], 100) }}
        </p>

        <a href="/posts/{{ $value['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
    </article>
    @endforeach
</x-layout>