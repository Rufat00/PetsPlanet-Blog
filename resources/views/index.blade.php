<x-layout>
    <x-header />

<aside class="container mx-auto mt-6">
    @if(request('author'))
        <div class="w-full text-center mb-3">
            <h3 class="text-2xl capitalize font-semibold">posts by {{ request('author') }}</h3>
            <a href="/" class="text-lg mt-2 block text-black underline">back home</a>
        </div>
    @endif
    <form action="/" method="GET" class="flex w-full">
        <input type="text" value="{{ request('search') }}" name="search" autocomplete="off" class="px-2 py-1 flex-grow text-md bg-transparent font-medium w-full rounded-l-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter Search query">
        <span class="py-2 px-2 text-xl font-medium text-white bg-green-500 rounded-r-md hover:bg-green-600 transition duration-300 cursor-pointer flex items-center justify-center"><i class='bx bx-search' ></i></span>
        
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
    </form>

    <form action="/" method="GET" class="mt-3">
        <div class="flex items-center relative">
            <select name="category" id="category" onchange="this.form.submit()" class="px-3 py-2 text-lg bg-transparent appearance-none font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700">
                
                @if(!request('category'))
                    <option selected value="">All</option>
                @else
                    <option value="">All</option>
                @endif

                @foreach($categories as $category)
                    @if(request('category') === $category->slug)
                        <option selected value="{{ $category->slug }}">{{ $category->category }}</option>
                    @else
                        <option value="{{ $category->slug }}">{{ $category->category }}</option>
                    @endif
                @endforeach
            </select>
            <i class='bx bx-chevron-down text-2xl absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-400'></i>

            @if (request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
        </div>
    </form>
</aside>

<section class="p-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 grid-rows-none">
    
    @foreach($posts as $post)

        <div class="rounded overflow-hidden shadow-lg hover:-translate-y-3 transition-transform">
            <a href="/post/{{ $post->slug }}"><img class="w-full" src="{{ $post->thumbnail }}" alt="Mountain"></a>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                <p class="text-gray-700 text-base">
                    {{ $post->describtion }}
                </p>
            </div>
            <div class="px-6 pt-1 pb-2">
                <a href="/?{{ http_build_query(request()->except('author', 'page')) }}&author={{ $post->author->name  }}" class="inline-block bg-green-500 rounded-full px-3 py-2 text-sm font-semibold text-gray-100 hover:bg-green-600 transition-colors mr-2 mb-2 capitalize">by {{ $post->author->name }}</a>
                <span class="inline-block bg-green-500 rounded-full px-3 py-2 text-sm font-semibold text-gray-100 mr-2 mb-2 capitalize">{{ date_format($post->created_at, 'd F Y') }}</span>
                <a href="/?{{ http_build_query(request()->except('category', 'page')) }}&category={{ $post->category->slug }}" class="inline-block bg-green-500 rounded-full px-3 py-2 text-sm font-semibold text-gray-100 hover:bg-green-600 transition-colors mr-2 mb-2 capitalize">{{ $post->category->category }}</a>
            </div>
        </div>

    @endforeach

</section>

{{ $posts->links() }}

</x-layout> 