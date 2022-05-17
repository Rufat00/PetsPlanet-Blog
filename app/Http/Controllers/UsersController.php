<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        return view('admin.users.index', [
            'users' => User::with('role')->filter( request(['search', 'role']) )->latest()->paginate(10)->withQueryString(),
            'roles' => Role::all()
        ]);
    }

    public function edit(User $user){
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user){

        $data = request()->validate([
            'role' => ['required', 'exists:roles,id']
        ]);

        $user->update([
            'role_id' => $data['role']
        ]);

        return redirect('/admin/users');
    }

}
