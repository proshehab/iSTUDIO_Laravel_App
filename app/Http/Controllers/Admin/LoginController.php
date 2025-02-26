<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    public function adminLogin()
    {
        return view('admin.auth.login');
    }


    // public function authenticate(Request $request)
    // {

    //     //dd($request->all());
    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             'email' => 'required|email',
    //             'password' => 'required'
    //         ],

    //         [

    //             'email.required' => 'Email is Required',
    //             'password.required' => 'Password is Required',

    //         ]
    //     );


    //     if ($validator->passes()) {

    //         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //             return redirect()->route('dashboard.index');
    //         } else {
    //             return redirect()->route('adminLogin')->with('Either email or password is incorrect');
    //         }
    //     } else {
    //         return redirect()->route('adminLogin')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
    // }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The password dosenot match',
        ])->onlyInput('email');
    }



    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
