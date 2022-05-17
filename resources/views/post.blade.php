<x-layout>
    <x-header />

    <section class="p-5">
        <div class="max-w-6xl mx-auto mt-5 bg-white rounded-md px-5 sm:px-7 py-7 shadow-md">

            <h1 class="text-3xl font-bold">
                {{ $post->title }}
                <a href="/?{{ http_build_query(request()->except('category', 'page')) }}&category={{ $post->category->slug }}" class="inline-block bg-green-500 rounded-full px-3 mx-1 py-2 text-sm font-semibold text-gray-100 hover:bg-green-600 transition-colors capitalize">{{ $post->category->category }}</a>
            </h1>

            <div class="mt-3 text-lg text-gray-500">
                {{ $post->describtion }}
            </div>

            <div class="text-base text-gray-500 capitalize mt-4">
                by <a href="/?author={{ $post->author->name }}" class="text-gray-500 underline">{{ $post->author->name }}</a> | {{ date_format($post->created_at, 'd F Y') }}
            </div>

            <div class="mt-7 w-full">
                <img src="{{ $post->thumbnail }}" alt="thumbnail" class="max-h-96 max-w-full rounded-lg">
            </div>

            <article class="body mt-8">
                {!! $post->body !!}
            </article>

        </div>
    </section>

    <div class="p-5">
        <div class="max-w-6xl mx-auto my-5 bg-white rounded-md px-5 py-4 shadow">
            @auth 
                <form action="/post/comment" method="POST" class="flex mb-4">
                    @csrf
                    <input type="text" name="body" autocomplete="off" class="px-2 py-1 flex-grow text-md bg-transparent font-medium w-full rounded-l-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Add Your Comment">
                    <button type="submit" class="py-2 px-2 text-xl font-medium text-white bg-green-500 rounded-r-md hover:bg-green-600 transition duration-300 cursor-pointer flex items-center justify-center"><i class='bx bx-send' ></i></button>
                    <input type="text" name="post" class="hidden" value="{{ $post->id }}">
                </form>
                @error('body')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            @endauth
            <div>
                @foreach($post->comments as $comment)
                    <div class="border border-solid border-gray-300 p-2 my-3 rounded">
                        <span class="font-semibold text-base capitalize block">{{ $comment->author->name }}</span>
                        <p class="mt-1 text-lg">{{ $comment->body }}</p>
                        <span class="text-gray-700 text-sm capitalize block mt-1">{{ date_format($comment->created_at, 'd F Y') }}</span>
                        @auth 
                            @if(auth()->user()->id === $comment->author->id || auth()->user()->role->permission_access_all_posts === 1 || auth()->user()->id === $post->author->id)
                                <form action="/post/comment/{{ $comment->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="mt-2 bg-red-500 rounded text-white p-1 hover:bg-red-600 transition-colors">delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layout>