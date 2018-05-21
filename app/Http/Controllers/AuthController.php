<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\user;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignup() {
        return view('auth.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:25',
            'password' => 'required|min:8',
        ]);


        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('index')->with('info', 'Your account created successfully');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        //return redirect()->route('index')->with('info', 'You are logedin now');

        if (!Auth::attempt( $request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'LOGED IN FAIL');
        } else {
            return redirect()->route('index')->with('info', 'You are logedin now');
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
