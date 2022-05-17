<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){

        $userData = $request->validate([
            'name' =>['required', 'max:100', 'unique:users'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required', 'max:25', 'min:5'],
        ]);

        $userData['password'] = Hash::make($userData['password']);

        $isCreated = User::create($userData);

        if($isCreated){
            auth()->login($isCreated);

            return redirect('/')->with('success', 'New user has been created successfuly');
        }   
        else{
            return back()->with('fail', 'Something went wrong, try again');
        }

    }

    public function login(Request $request){

        $userData = $request->validate([
            'email' => ['required', 'email','exists:users'],
            'password' => ['required', 'max:25', 'min:5'],
        ]);

        if (! auth()->attempt($userData)) {
            throw ValidationException::withMessages([
                'password' => 'Incorrect password'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');

    }

    public function logout(Request $request){

        auth()->logout();

        return redirect('/')->with('success', 'Successfuly loged out');

    }

}
