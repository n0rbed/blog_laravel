<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $input = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($input)) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function signup(Request $request){
        $input = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:80'],
        ]);

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input); 
        auth()->login($user);
        
        return redirect('/');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
