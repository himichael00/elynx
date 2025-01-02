@extends('dashboard.components.layout')

@section('container')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="w-full px-6 px-4 mx-auto">
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                <a class="opacity-50 text-slate-700" href="javascript:;">Dashboard</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">My Posts</li>
            </ol>
        </div>
    </div>
    
    <div class="w-full px-6 py-1 mx-auto">
      <div class="w-full px-6 px-4 mx-auto">
        <a href="/dashboard/posts/create" class="text-white bg-gradient-to-r from-red-400 via-red-600 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          Add Post
        </a>
      </div>
    </div>

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">

      @if (session()->has('success'))
          <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-400 bg-green-100 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <div class="ms-3 text-sm font-medium">
                  {{ session('success') }}
              </div>
              <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
              <span class="sr-only">Dismiss</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              </button>
          </div>
      @endif

        <!-- table -->
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent shadow-soft-xl rounded-2xl">
                <div class="p-6 pb-0 mb-0 bg-white border-b rounded-t-2xl">
                  <h6 class="text-lg font-semibold">Your Posts Table</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                    <table class="table-auto w-full mb-0 text-sm text-left text-slate-500 border-collapse">
                      <thead class="bg-gray-100 text-xs uppercase text-slate-400">
                        <tr>
                          <th class="px-4 py-3 border-b">#</th>
                          <th class="px-4 py-3 border-b">Title</th>
                          <th class="px-4 py-3 border-b">Category</th>
                          <th class="px-4 py-3 border-b">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $value)
                        <tr class="bg-white border-b hover:bg-gray-50">
                          <td class="px-4 py-3">
                            <div class="flex items-center">{{ $loop->iteration }}</div>
                          </td>
                          <td class="px-4 py-3">
                            <p class="mb-0 font-semibold text-slate-700">{{ $value->title }}</p>
                          </td>
                          <td class="px-4 py-3">
                            <span class="inline-block px-2.5 py-0.5 text-xs font-medium rounded-full bg-{{ $value->category->color }}-100 text-primary-800">
                              {{ $value->category->category_title }}
                            </span>
                          </td>
                          <td class="px-4 py-3">
                            <div class="flex space-x-2">
                              <a href="/dashboard/posts/{{ $value->slug }}" class="text-slate-400 hover:scale-125">
                                <img class="w-5 h-5" src="{{ asset('./assets/img/outline/eye-open.svg') }}" alt="View">
                              </a>
                              <a href="/dashboard/posts/{{ $value->slug }}/edit" class="text-slate-400 hover:scale-125">
                                <img class="w-5 h-5" src="{{ asset('./assets/img/outline/pen-3.svg') }}" alt="Edit">
                              </a>
                              <form action="/dashboard/posts/{{ $value->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="text-slate-400 hover:scale-125" onclick="return confirm('Are You Sure Wants To Delete This Post?')">
                                  <img class="w-5 h-5" src="{{ asset('./assets/img/outline/trash.svg') }}" alt="Delete">
                                </button>
                              </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
          
        

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
@endsection