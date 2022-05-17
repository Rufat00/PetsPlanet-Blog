<x-admin.layout>
    <x-admin.header class="flex-col">
        <form action="/admin/images" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image" class="py-2 px-2 text-base font-medium inline-block text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300 cursor-pointer">Chose Image</label>
            <input type="file" required name="image" id="image" accept='image/*' class="hidden">
            <input type="submit" class="py-2 px-2 text-base font-medium text-white bg-green-500 rounded hover:bg-green-600 transition duration-300 cursor-pointer" value="Upload" >
        </form>
        <div class="my-1 mt-3 bg-slate-100">
            <img id="preview" class="max-h-56 max-w-full block mx-auto">
        </div>
    </x-admin.header>

    <div class="w-full text-center">
        @error('allowed')
            <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
        @enderror
        @error('image')
            <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
        @enderror   
    </div>

    <section class="grid grid-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5 lg:gap-7 my-10 px-5">
        @foreach ($images as $image)
            <div class="bg-white rounded-lg border shadow-md md:max-w-none overflow-hidden mx-auto">
                <div class="border-b border-solid border-gray-100">
                    <img class="max-h-56 w-full object-cover" src="{{ asset('storage/'.$image->image) }}" alt="" />
                </div>
                <div class="p-3 flex text-2xl">
                    <form action="{{ '/admin/images/'.$image->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="hover:bg-gray-200 flex items-center justify-center transition-colors p-2 rounded-full"><i class='bx bx-trash-alt' ></i></button>
                    </form>

                    <form action="{{ '/admin/images/'.$image->id }}" method="GET">
                        @csrf
                        <button class="hover:bg-gray-200 flex items-center justify-center transition-colors p-2 rounded-full"><i class='bx bxs-download' ></i></button>
                    </form>

                    <button class="hover:bg-gray-200 flex items-center justify-center transition-colors p-2 rounded-full" name="link" data-link="{{ asset('storage/'.$image->image) }}"> <i class='bx bx-link' ></i> </button>
                </div>
            </div>
        @endforeach
    </section>

    {{ $images->links() }}
    <script src="/js/images.js"></script>
</x-admin.layout>