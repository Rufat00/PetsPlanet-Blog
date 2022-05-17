<x-layout>
    <div class="flex justify-center align-middle absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 sm:p-0 p-5 w-full">
        <form action= "auth/login" method="POST" class="w-full sm:w-auto">
            @csrf
            <h1 class="text-center text-3xl mb-5">Log in</h1>

            <div class="my-5">
                <label for="email" class="text-xl block mb-2 ml-1 font-bold">Email</label>
                <input type="text" value="{{ old('email') }}" name="email" id="email" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter email address">
                @error('email')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <label for="password" class="text-xl block mb-2 ml-1 font-bold">Password</label>
                <input type="password" name="password" id="password" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block sm:w-96 border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter password">
                @error('password')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5">
                <input type="submit" class="w-full sm:w-96 text-white shadow-md bg-green-500 px-3 py-3 text-lg font-medium rounded-md cursor-pointer hover:bg-green-600 transition-colors" value="Log in">
            </div>

            <a href="{{ route('auth.registration') }}" class="text-base text-green-500 underline-offset-2 underline hover:text-green-600">Create new account</a>

        </form>
    </div>
</x-layout>