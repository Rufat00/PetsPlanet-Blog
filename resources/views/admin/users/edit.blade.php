<x-layout>
        <div class="w-full text-center my-3">
            <h3 class="text-2xl capitalize font-semibold">Access {{ $user->name }}</h3>
            <p class="text-lg mt-2 block text-black underline">{{ $user->email }} </p>
        </div>

    <form action="/admin/users/{{ $user->id }}" method="POST" class="container mx-auto px-5">
        @csrf
        <div class="flex items-center relative mt-4">
            <select name="role" id="role" class="px-3 py-2 text-md bg-transparent appearance-none font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700">
                @foreach($roles as $role)
                    @if($user->role_id === $role->id)
                        <option selected value="{{ $role->id }}">{{ $role->role }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endif
                @endforeach
            </select>
            <i class='bx bx-chevron-down text-2xl absolute right-0 top-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-400'></i>
        </div>

        <div class="mt-5">
            <input type="submit" class="w-full text-white shadow-md bg-green-500 px-3 py-3 text-md font-medium rounded-md cursor-pointer hover:bg-green-600 transition-colors" value="Change Role">
        </div>
    </form>
</x-layout>