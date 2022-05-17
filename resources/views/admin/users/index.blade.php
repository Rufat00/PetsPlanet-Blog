<x-admin.layout>
    <x-admin.header class="flex-col sm:flex-row">
        <form action="/admin/users" method="GET" class="w-full px-1">
            <div class="flex">
                <input type="text" value="{{ request('search') }}" name="search" autocomplete="off" class="px-2 py-1 flex-grow text-md bg-transparent font-medium w-full rounded-l-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter roles name">
                <span class="py-2 px-2 text-xl font-medium text-white bg-green-500 rounded-r-md hover:bg-green-600 transition duration-300 cursor-pointer flex items-center justify-center"><i class='bx bx-search' ></i></span>
            </div>

            <div class="flex items-center relative mt-4">
                <select name="role" id="role" onchange="this.form.submit()" class="px-3 py-2 text-md bg-transparent appearance-none font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700">

                    @if(!request('role'))
                        <option selected value="">All</option>
                    @else
                        <option value="">All</option>
                    @endif

                    @foreach($roles as $role)
                        @if(request('role') === $role->role)
                            <option selected value="{{ $role->role }}">{{ $role->role }}</option>
                        @else
                            <option value="{{ $role->role }}">{{ $role->role }}</option>
                        @endif
                    @endforeach
                </select>
                <i class='bx bx-chevron-down text-2xl absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-400'></i>
            </div>

        </form>
    </x-admin.header>

    <section class="px-5">
        <table class="w-full bg-white rounded-lg overflow-hidden shadow-lg my-5 inline-table border-collapse">
			<thead class="text-white">
				<tr class="bg-green-500 table-row rounded-l-lg rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-left">Id</th>
					<th class="p-3 text-left">Title</th>
					<th class="p-3 text-left" width="110px">Actions</th>
				</tr>
			</thead>
			<tbody class="flex-none">
                @foreach($users as $user)
                    <tr class="table-row mb-2 sm:mb-0">
				    	<td class="border border-gray-300 border-solid p-3">{{ $user->id }}</td>
				    	<td class="border border-gray-300 border-solid p-3 truncate text-ellipsis overflow-hidden whitespace-nowrap">{{ $user->email  }}</td>
				    	<td class="border border-gray-300 border-solid p-3">
                            <form action="/admin/users/{{ $user->id }}" method="user">
                                @method('DELETE')
                                @csrf
                                <a href="/admin/users/{{ $user->id }}" class="py-2 px-2 text-base font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 transition duration-300 cursor-pointer">Edit</a>
                            </form>
                        </td>
				    </tr>
                @endforeach
			</tbody>
		</table>
    </section>

    {{ $users->links() }}

</x-admin.layout>