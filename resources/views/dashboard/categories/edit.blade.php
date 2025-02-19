@extends('dashboard.components.layout')

@section('container')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full px-6 px-4 mx-auto">
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                <a class="opacity-50 text-slate-700" href="javascript:;">Edit Post</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">My Posts</li>
            </ol>
        </div>
    </div>

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">

        <section class="bg-white dark:bg-gray-900 rounded-lg">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit post</h2>
                <form method="POST" action="/dashboard/categories/{{ $categories->slug }}">
                    @method('put')
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="category_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                            <input 
                                type="text" 
                                name="category_title" 
                                id="category_title" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                placeholder="Type category name" 
                                value="{{ old('category_title', $categories->category_title) }}"
                            >
                            @error('category_title')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                            <input 
                                type="text"
                                name="slug" 
                                id="slug" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                placeholder="Type slug name" 
                                value="{{ old('slug', $categories->slug) }}"
                            >
                            @error('slug')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Color</label>
                            <select 
                                name="color" 
                                id="color"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            >
                                @foreach ($category_colors as $color)
                                {{-- check if submitted value exist or not, if not then goes to existing $categories->color value --}}
                                    @if (old('color', $categories->color) == explode('-', $color->color_name)[1])
                                        <option value="{{ explode('-', $color->color_name)[1] }}" selected>{{ ucfirst(explode('-', $color->color_name)[1]) }}</option>
                                    @else
                                    {{-- if not matched, just render the other color as another option --}}
                                        <option value="{{ explode('-', $color->color_name)[1] }}">{{ ucfirst(explode('-', $color->color_name)[1]) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('color')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    <button type="submit" class="text-white mt-5 bg-gradient-to-r from-red-400 via-red-600 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update Post</button>
                </form>
            </div>
        </section>

        <footer class="pt-4">
        <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                ©
                <script>
                    document.write(new Date().getFullYear() + ",");
                </script>
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Creative Tim</a>
                for a better web.
                </div>
            </div>
            </div>
        </div>
        </footer>
    </div>
    <!-- end cards -->

    <script>
        const categories_title = document.querySelector('#category_title');
        const slug = document.querySelector('#slug');

        category_title.addEventListener('change', function(){
            fetch('/dashboard/categories/checkSlug?category_title=' + category_title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection