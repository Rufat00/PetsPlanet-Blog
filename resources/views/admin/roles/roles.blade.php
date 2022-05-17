<x-admin.layout>

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
                @foreach($roles as $role)
                    <tr class="table-row mb-2 sm:mb-0">
				    	<td class="border border-gray-300 border-solid p-3">{{ $role->id }}</td>
				    	<td class="border border-gray-300 border-solid p-3 truncate text-ellipsis overflow-hidden whitespace-nowrap">{{ $role->role  }}</td>
				    	<td class="border border-gray-300 border-solid p-3">
                            @auth
                            @if($role->id !== 1 && $role->id !== 2 && auth()->user()->role->permission_access_roles === 1)
                                <form action="/admin/roles/{{ $role->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="py-2 px-2 text-base font-medium text-white bg-red-500 rounded hover:bg-red-600 transition duration-300 cursor-pointer">Delete</button>
                                </form>
                            @endif
                            @endauth
                        </td>
                        <td class="border border-gray-300 border-solid p-3">
                            @auth
                            @if($role->id !== 1 && $role->id !== 2 && auth()->user()->role->permission_access_roles === 1)
                                <a href="/admin/roles/edit/{{ $role->id }}" class="py-2 px-2 text-base font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 transition duration-300 cursor-pointer">Edit</a>
                            @endif
                            @endauth
                        </td>
				    </tr>
                @endforeach
			</tbody>
		</table>
        <div class="w-full px-6">
        <a href="/admin/roles/create" disabled class="w-full py-2 px-2 mt-2 sm:mt-0 text-base block font-medium text-white bg-green-500 rounded hover:bg-green-600 transition duration-300 cursor-pointer text-center">Create New</a>
        </div>
    </section>
</x-admin.layout>