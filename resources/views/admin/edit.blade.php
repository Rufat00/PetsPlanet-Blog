<x-layout>
    <header class="w-full h-fit py-3 px-5">
        <div class="flex justify-between items-center bg-white py-1 px-3 sm:px-9 rounded-md">
            <h4 class="text-xl font-medium">Edit {{ $post->title }}</h4>
            <a href="{{ route('admin.home') }}" class="text-3xl text-black"><i class='bx bx-x my-1'></i></a>
        </div>
    </header>

    <section class="container mx-auto my-3 px-5 sm:px-0">
        <form action= "/admin/posts/{{ $post->id }}" method="POST" class="w-full">
            @csrf
            @method('PATCH')

            <div class="my-5">
                <label for="title" class="text-xl block mb-2 ml-1 font-bold">Title</label>
                <input type="text" value="{{ old('title', $post->title) }}" name="title" id="title" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter posts title">
                @error('title')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <label for="describtion" class="text-xl block mb-2 ml-1 font-bold">Describtion</label>
                <input type="text" value="{{ old('describtion', $post->describtion) }}" name="describtion" id="describtion" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter posts describtion">
                @error('describtion')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <label for="thumbnail" class="text-xl block mb-2 ml-1 font-bold">thumbnail</label>
                <input type="text" value="{{ old('thumbnail', $post->thumbnail) }}" name="thumbnail" id="thumbnail" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter posts thumbnails url">
                @error('thumbnail')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <label for="category" class="text-xl block mb-2 ml-1 font-bold">Category</label>
                <div class="flex items-center relative">
                    <select name="category" id="category" class="px-3 py-3 text-lg bg-transparent appearance-none font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700">
                        <option selected>Select category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down text-2xl absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-400'></i>
                </div>
            </div>

            <div class="my-5">
                <textarea name="body" id="body">
                    {{ old('body', $post->body) }}
                </textarea>
                @error('body')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <input type="submit" class="w-full text-white shadow-md bg-green-500 px-3 py-3 text-lg font-medium rounded-md cursor-pointer hover:bg-green-600 transition-colors" value="Update">
            </div>

        </form>
    </section>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body',  // change this value according to your HTML
            plugins: 'image link lists emoticons horizontal imagetools codesample autoresize',
            menubar: '',
            toolbar: 'h2 h3 h4 h5 h6 | bold italic underline | forecolor backcolor link | alignleft aligncenter alignright | bullist numList | emoticons hr image imagetools | undo redo',
            image_title: false,
            image_uploadtab: false,
            object_resizing: true,
            image_description: false,
            imagetools_proxy: 'localhost:8000',
            style_formats: [{
                    title: '',
                    selector: 'img',
                    styles: {
                        borderBottom: '10px solid red'
                    }
                }]
            })
    </script>
</x-layout>