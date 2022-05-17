<header class="bg-white shadow-lg">
	<nav class="max-w-6xl mx-auto px-4">
		<div class="flex justify-between">
            <div>
				<a href="#" class="flex items-center py-4 px-2">
					<img src="/images/logo-black.png" alt="Logo" class="h-8 w-8 mr-2">
					<span class="font-semibold text-gray-500 text-lg">Pets Planet</span>
				</a>
			</div>

			<div class="flex items-center space-x-3 flex-wrap justify-center ">
                @auth 
                    <p class="text-lg capitalize font-semibold">{{ auth()->user()->name }}</p>
                    <form action="/auth/logout" method="POST">
                        @csrf
                        <input type="submit" class="py-2 px-2 text-base font-medium text-white bg-green-500 rounded hover:bg-green-600 transition duration-300 cursor-pointer" value="Log out" >
                    </form>
                @else 
                    <a href="{{ route('auth.login') }}" class="py-2 px-2 text-base font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300 cursor-pointer">Log In</a>
				    <a href="{{ route('auth.registration') }}" class="py-2 px-2 text-base font-medium text-white bg-green-500 rounded hover:bg-green-600 transition duration-300 cursor-pointer">Sign Up</a>
                @endauth
			</div>
		</div>
	</nav>
</header>