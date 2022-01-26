<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|min:4|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user->save();
        $score = new Score();
        $score->user_id = $user->id;
        $score->save();

        if($res)
        {
            return redirect('login')->with('success', 'You have registered successfully.');
        }
        else
            return back()->with('fail', 'Something wrong. Check your input.');
    
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            $request->session()->put('loginId', $user->id);
            return redirect('dashboard');
            {
                return back()->with('fail', 'Password not matches.');
            }
        }
        else
        {
            return back()->with('fail', 'This email is not registered.');
        }

    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
