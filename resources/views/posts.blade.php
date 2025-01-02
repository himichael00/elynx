<x-layout>
    {{-- store title from web routes --}}
    <x-slot:post_title>{{ $title }}</x-slot>

    {{-- SEARCH BAR --}}
    <x-search></x-search>

    {{ $posts->links() }}

    {{-- <section class="bg-white dark:bg-gray-900"> --}}
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-0">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

    @forelse ($posts as $value)
    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center mb-5 text-gray-500">
            <span class="bg-{{ $value->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                <a href="/posts?category={{ $value->category->slug }}" class="hover:underline">{{ $value->category->category_title }}</a>
            </span>
            <span class="text-sm">{{ $value['created_at']->diffForHumans() }}</span>
        </div>
        <a href="/posts/{{ $value['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $value['title'] }}</h2>
        </a>
        <p class="my-4 font-light">
            {!! Str::limit($value->body, 100) !!}
        </p>
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                <span class="font-medium dark:text-white">
                    <a href="/posts?authors={{ $value->author->username }}" class="hover:underline">{{ $value->author->name }}</a>
                </span>
            </div>
            <a href="/posts/{{ $value['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
        </div>
    </article>
    @empty
        <div>
            <p class="font-semibold text-xl my-4">Article not found 404</p>
            <a href="/posts" class="block text-blue-600 hover:underline">&laquo; Back To Posts</a>
        </div>
    @endforelse
            </div>  
        </div>
    
    {{ $posts->links() }}
    {{-- </section> --}}
</x-layout>