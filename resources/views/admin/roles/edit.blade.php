<x-layout>
    <header class="w-full h-fit py-3 px-5">
        <div class="flex justify-between items-center bg-white py-1 px-3 sm:px-9 rounded-md">
            <h4 class="text-xl font-medium">Update {{ $role->role }} Role</h4>
            <a href="{{ route('admin.home') }}" class="text-3xl text-black"><i class='bx bx-x my-1'></i></a>
        </div>
    </header>

    <section class="container mx-auto my-3 px-5 sm:px-0">
        <form action= "/admin/roles/{{ $role->id }}" method="POST" class="w-full">
            @csrf
            @method("PATCH")

            <div class="my-5">
                <label for="role" class="text-xl block mb-2 ml-1 font-bold">Role</label>
                <input type="text" value="{{ old('role', $role->role) }}" autocomplete="off" name="role" id="role" class="px-3 py-2 text-lg bg-transparent font-medium w-full rounded-md border-2 shadow-base block border-gray-400 text-gray-400 focus:border-green-500 focus:text-gray-700" placeholder="Enter Roles Name">
                @error('role')
                    <span class="text-red-600 text-sm my-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Use Dashboard:</span>
                <label for="permission_use_dashboard" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_use_dashboard" id="permission_use_dashboard"  @checked(old('permission_use_dashboard', $role->permission_use_dashboard)) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Access Posts:</span>
                <label for="permission_access_posts" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_access_posts" id="permission_access_posts"  @checked(old('permission_access_own_posts', $role->permission_access_own_posts)) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Access Categories:</span>
                <label for="permission_access_categories" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_access_categories" id="permission_access_categories"  @checked(old('permission_access_categories', $role->permission_access_categories)) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Access Images:</span>
                <label for="permission_access_images" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_access_images" id="permission_access_images"  @checked(old('permission_access_images', $role->permission_access_images)) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Access Roles:</span>
                <label for="permission_access_roles" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_access_roles" id="permission_access_roles"  @checked(old('permission_access_roles', $role->permission_access_roles )) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5 flex items-center">
                <span class="text-xl block font-bold">Access Users:</span>
                <label for="permission_access_users" class="relative inline-flex items-center cursor-pointer ml-3">
                    <input type="checkbox" value="1" name="permission_access_users" id="permission_access_users" @checked(old('permission_access_users', $role->permission_access_users)) class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                </label>
            </div>

            <div class="my-5">
                <input type="submit" class="w-full text-white shadow-md bg-green-500 px-3 py-3 text-lg font-medium rounded-md cursor-pointer hover:bg-green-600 transition-colors" value="Update">
            </div>

        </form>
    </section>
</x-layout>