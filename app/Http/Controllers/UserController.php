<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show Register / create Form

    public function create()
    {

        return view('users.register');
    }

    // create new user 

    public function store(Request $request)
    {

        $formFields = $request->validate([

            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);

        // hash password

        $formFields['password'] = bcrypt($formFields['password']);


        //create user and login 

        $user = User::create($formFields);


        //Login
        auth()->login($user);


        return redirect('/')->with('message', 'User created and Logged In');
    }

    // logout
    public function logout(Request $request)
    {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')
            ->with('message', 'You have been LoggedOut!!');
    }


    // show login form 

    public function login()
    {

        return view('users.login');
    }

    // aunthenticate user

    public function aunthenticate(Request $request)
    {


        $formFields = $request->validate([


            'email' => ['required', 'email'],
            'password' => 'required'

        ]);


        if (auth()->attempt($formFields)) {

            $request->session()->regenerate();

            return redirect('/')->with('message', 'Your are now Logged in !');
        }

        return back()->withErrors(['email' => 'Invalid Log in Details'])->onlyInput();
    }
}
