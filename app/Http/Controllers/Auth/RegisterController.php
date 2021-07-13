<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required','string', 'confirmed'],
        ]);
        
        $user = new User;
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = 'user';
        $user->save();
        
        // if (Auth::attempt(['email'=>$user->email, 'password'=>$user->password])) {
        //     $request->session()->regenerate();
        //     return redirect('dashboard');
        // }
        return redirect('login');
    }
}
