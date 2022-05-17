<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{
    public function index(){
        return view('admin.roles.roles',[
            'roles' => Role::all()
        ]);
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function edit(Role $role){
        return view('admin.roles.edit',[
            'role' => $role
        ]);
    }

    public function store(Request $request){

        $data = $request->validate([
            "role" => ['required', 'max:30', 'min:3', 'unique:roles'],
            "permission_use_dashboard" => ['boolean'],
            "permission_access_posts" => ['boolean'],
            "permission_access_categories" => ['boolean'],
            "permission_access_roles" => ['boolean'],
            "permission_access_users" => ['boolean'],
            "permission_access_images" => ['boolean'],
        ]);

        Role::create($data);

        return redirect('/admin/roles');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect('/admin/roles');
    }

    public function update(Role $role){

        $data = request()->validate([
            "role" => ['required', 'max:30', 'min:3', Rule::unique('roles')->ignore($role->id)],
            "permission_use_dashboard" => ['boolean'],
            "permission_access_posts" => ['boolean'],
            "permission_access_categories" => ['boolean'],
            "permission_access_roles" => ['boolean'],
            "permission_access_users" => ['boolean'],
            "permission_access_images" => ['boolean'],
        ]);

        $role->update([
            "role" => $data["role"],
            "permission_use_dashboard" => isset($data['permission_use_dashboard'])? '1' : '0',
            "permission_access_posts" => isset($data['permission_access_own_posts'])? '1' : '0',
            "permission_access_categories" => isset($data['permission_access_categories'])? '1' : '0',
            "permission_access_roles" => isset($data['permission_access_roles'])? '1' : '0',
            "permission_access_users" => isset($data['permission_access_users'])? '1' : '0',
            "permission_access_images" => isset($data['permission_access_images'])? '1' : '0', 
        ]);

        return redirect('/admin/roles');
    }
}
