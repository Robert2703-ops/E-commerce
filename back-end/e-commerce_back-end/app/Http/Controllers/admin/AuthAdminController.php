<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{

    // login 
    public function loginView() {
        if ( Auth::check() ){
            return redirect()->route('products-crud');
        }

        return view( 'access.login' );
    }

    public function login( Request $request ) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ( Auth::attempt($data) ) {
            $request->session()->regenerate();
            return redirect()->route('products-crud');
        }

        return redirect()->back()->withErrors('User not found, please, check the fields and try again');
    }

    // register
    public function registerView() {
        if ( Auth::check() ) {
            return redirect()->route('products-crud');
        }
        return view('access.register');
    }

    public function register( Request $request ) {
        $data = $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|min:4|unique:admins,email',
            'password' => 'required|string|confirmed'
        ]);

        $data = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('login')->with('message', 'Account created!');
    }

    // logout
    public function logout( Request $request ) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
