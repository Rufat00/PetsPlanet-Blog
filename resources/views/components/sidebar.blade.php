<aside class="md:flex flex-col md:flex-row md:min-h-screen md:w-fit w-full bg-white">
    <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 md:max-h-screen flex-shrink-0" x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <a href="/" class="text-lg flex items-center justify-center font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline"><img src="/images/logo-black.png" alt="logo" class="w-9 h-9 mr-2">Pets Planet</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-grow md:flex px-4 pb-4 md:pb-0 md:overflow-y-auto flex-col justify-between">
            <div>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-white focus:text-white hover:bg-green-500 focus:bg-green-500 focus:outline-none focus:shadow-outline transition-colors" href="/admin">Main</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-white focus:text-white hover:bg-green-500 focus:bg-green-500 focus:outline-none focus:shadow-outline transition-colors" href="/admin/categories">Categories</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-white focus:text-white hover:bg-green-500 focus:bg-green-500 focus:outline-none focus:shadow-outline transition-colors" href="/admin/roles">Roles</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-white focus:text-white hover:bg-green-500 focus:bg-green-500 focus:outline-none focus:shadow-outline transition-colors" href="/admin/users">Users</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg hover:text-white focus:text-white hover:bg-green-500 focus:bg-green-500 focus:outline-none focus:shadow-outline transition-colors" href="/admin/images">Images</a>
            </div>
            <div class="flex items-center justify-between md:py-2 px-4 flex-wrap border-t border-gray-400 border-solid pt-3 mt-3">
                @auth 
                    <p class="text-base capitalize font-semibold">{{ auth()->user()->name }}</p>
                    <form action="/auth/logout" method="POST">
                        @csrf
                        <input type="submit" class="py-2 px-2 text-base font-medium text-white bg-green-500 rounded hover:bg-green-600 transition duration-300 cursor-pointer" value="Log out" >
                    </form>
                @endauth
            </div>
        </nav>
    </div>
</aside>