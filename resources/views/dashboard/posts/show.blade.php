@extends('dashboard.components.layout')

@section('container')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?authors={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                                <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    <a href="/posts?category={{ $post->category->slug }}" class="hover:underline">{{ $post->category->category_title }}</a>
                                </span>
                            </div>
                        </div>
                    </address>
                    <div class="flex d-inline">
                        <a href="/dashboard/posts" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-xs px-2 py-1 text-center me-2 mb-2">
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 18 18"><title>arrow door out 3</title><g stroke-width="1.5" fill="none" stroke="#FFFF" class="nc-icon-wrapper"><path d="M11.75,5.75V3.25c0-.552-.448-1-1-1H4.25c-.552,0-1,.448-1,1V14.75c0,.552,.448,1,1,1h6.5c.552,0,1-.448,1-1v-2.5" stroke-linecap="round" stroke-linejoin="round"></path><polyline points="14.5 6.25 17.25 9 14.5 11.75" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFF"></polyline><line x1="17.25" y1="9" x2="11.25" y2="9" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFF"></line><path d="M3.457,2.648l3.321,2.059c.294,.182,.473,.504,.473,.85v6.887c0,.346-.179,.667-.473,.85l-3.322,2.06" stroke-linecap="round" stroke-linejoin="round"></path></g>
                            </svg>
                            Back to all my posts
                        </a>
                        <a href="" class="text-white bg-gradient-to-r from-yellow-400 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-500 font-medium rounded-lg text-xs px-2 py-1 text-center me-2 mb-2">
                            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 18 18"><title>pen 3</title><g stroke-width="1.5" fill="none" stroke="#FFFF" class="nc-icon-wrapper"><path d="M10,5l3.586,3.586c.781,.781,.781,2.047,0,2.828l-1.586,1.586" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFF"></path><path d="M2.75,15.25s3.599-.568,4.546-1.515c.947-.947,7.327-7.327,7.327-7.327,.837-.837,.837-2.194,0-3.03-.837-.837-2.194-.837-3.03,0,0,0-6.38,6.38-7.327,7.327s-1.515,4.546-1.515,4.546h0Z" stroke-linecap="round" stroke-linejoin="round"></path></g>
                            </svg>
                            Edit
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" onclick="return confirm('Are You Sure Wants To Delete This Post?')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs px-2 py-1 text-center me-2 mb-2">
                            @method('delete')
                            @csrf
                            <button>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 18 18"><title>trash</title><g stroke-width="1.5" fill="none" stroke="#FFFF" class="nc-icon-wrapper"><line x1="2.75" y1="4.25" x2="15.25" y2="4.25" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFF"></line><path d="M6.75,4.25v-1.5c0-.552,.448-1,1-1h2.5c.552,0,1,.448,1,1v1.5" stroke-linecap="round" stroke-linejoin="round" stroke="#FFFF"></path><path d="M13.5,6.75l-.4,7.605c-.056,1.062-.934,1.895-1.997,1.895H6.898c-1.064,0-1.941-.833-1.997-1.895l-.4-7.605" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                                Delete
                            </button>
                        </form>
                    </div>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </main>
@endsection