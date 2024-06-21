<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth()
    {
        if(!empty(Auth::check()) && Auth::user()-> role_id == 1)
             {

                return redirect('/home');
             }
        return view('pages.athentification');
    }
    public function login(Request $request)
    {

       if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id'=> 1 ]))
         {
            return redirect('/home');
         }
        else
         {
        return redirect()->back()->with('error','S_il vous plait, entrez un email valide');
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('/login');
    }
}
