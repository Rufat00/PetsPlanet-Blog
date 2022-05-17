<x-admin.layout>
    <x-admin.header class="flex-col sm:flex-row">
        <form action="/admin/" method="GET" class="flex">
            <input type="text" value="{{ request('search') }}" name="search" autocomplete="off" class="px-2 py-1 text-md bg-transparent font-medium w-full rounded-l-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter Search Query">
            <span class="py-2 px-2 text-xl font-medium text-white bg-green-500 rounded-r-md hover:bg-green-600 transition duration-300 cursor-pointer flex items-center justify-center"><i class='bx bx-search' ></i></span>
        </form>
        <a href="{{ route('admin.create') }}" disabled class="py-2 px-2 mt-2 sm:mt-0 text-base font-medium text-white bg-green-500 rounded hover:bg-green-500 transition duration-300 cursor-pointer">Create New</a>
    </x-admin.header>

    <section class="px-5">
        <table class="w-full bg-white rounded-lg overflow-hidden shadow-lg my-5 inline-table border-collapse">
			<thead class="text-white">
				<tr class="bg-green-500 table-row rounded-l-lg rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-left">Id</th>
					<th class="p-3 text-left">Title</th>
					<th class="p-3 text-left" width="110px">Delete</th>
                    <th class="p-3 text-left" width="110px">Edit</th>
				</tr>
			</thead>
			<tbody class="flex-none">
                @foreach($posts as $post)
                    <tr class="table-row mb-2 sm:mb-0">
				    	<td class="border border-gray-300 border-solid p-3">{{ $post->id }}</td>
				    	<td class="border border-gray-300 border-solid p-3 truncate text-ellipsis overflow-hidden whitespace-nowrap">{{ $post->title  }}</td>
				    	<td class="border border-gray-300 border-solid p-3">
                            @auth
                            @if(auth()->user()->role->permission_access_posts === 1)
                                <form action="/admin/posts/{{ $post->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="py-2 px-2 text-base font-medium text-white bg-red-500 rounded hover:bg-red-600 transition duration-300 cursor-pointer">Delete</button>
                                </form>
                            @endif
                            @endauth
                        </td>
                        <td class="border border-gray-300 border-solid p-3">
                            @auth
                            @if(auth()->user()->role->permission_access_posts === 1)
                                <a href="/admin/posts/edit/{{ $post->id }}" class="py-2 px-2 text-base font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 transition duration-300 cursor-pointer">Edit</a>
                            @endif
                            @endauth
                        </td>
				    </tr>
                @endforeach
			</tbody>
		</table>
    </section>

    {{ $posts->links() }}

</x-admin.layout>