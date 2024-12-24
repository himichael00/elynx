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
    
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">

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
                              <a href="/dashboard/posts/{{ $value->slug }}/delete" class="text-slate-400 hover:scale-125">
                                <img class="w-5 h-5" src="{{ asset('./assets/img/outline/trash.svg') }}" alt="Delete">
                              </a>
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