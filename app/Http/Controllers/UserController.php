<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.register');
    }
    //Create New User
    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',\Illuminate\Validation\Rule::unique('users','email')],
            'password'=>['require|confirmed|min:6']
        ]);
        //Hash Password
        $formFields['password']=bcrypt($formFields['password']);
        //Create User
        $user=User::create($formFields);
        //Login
        Auth()->login($user);
        return redirect('/')->with('message','user created and logged in');
    }
    //Logout
    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','you have been logged out :(');
    }
    //Show Login Form
    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.login');
    }
    //Authenticate User
    public function authenticate(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>['require']
        ]);
        if (auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','you are now logged in :)');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }

}
