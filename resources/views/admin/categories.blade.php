<x-admin.layout>
    <x-admin.header>
        <form action="/admin/categories" method="POST" class="w-full flex justify-center">
            @csrf
            <input type="text" value="{{ old('category') }}" name="category" autocomplete="off" class="px-2 py-1 text-md bg-transparent font-medium w-full rounded-l-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter categories name">
            <input type="submit" class="py-2 px-2 text-base font-medium text-white bg-green-500 rounded-r-md hover:bg-green-600 transition duration-300 cursor-pointer" value="Create">
        </form>
    </x-admin.header>

    <div class="w-full text-center">
        @error('Category')
            <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
        @enderror
        @error('allowed')
            <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
        @enderror    
    </div>

    <section class="px-5">
        <table class="w-full bg-white rounded-lg overflow-hidden shadow-lg my-5 inline-table border-collapse">
			<thead class="text-white">
				<tr class="bg-green-500 table-row rounded-l-lg rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-left">Id</th>
					<th class="p-3 text-left">Category</th>
					<th class="p-3 text-left" width="110px">Actions</th>
				</tr>
			</thead>
			<tbody class="flex-none">
                @foreach($categories as $category)
                    <tr class="table-row mb-2 sm:mb-0">
				    	<td class="border border-gray-300 border-solid p-3">{{ $category->id }}</td>
				    	<td class="border border-gray-300 border-solid p-3 truncate text-ellipsis overflow-hidden whitespace-nowrap">{{ $category->category  }}</td>
				    	<td class="border border-gray-300 border-solid p-3">
                            <form action="/admin/categories/{{ $category->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="py-2 px-2 text-base font-medium text-white bg-red-500 rounded hover:bg-red-600 transition duration-300 cursor-pointer">Delete</button>
                            </form>
                        </td>
				    </tr>
                @endforeach
			</tbody>
		</table>
    </section>

</x-admin.layout>