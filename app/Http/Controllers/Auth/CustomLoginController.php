<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Auth;

class CustomLoginController extends Controller
{
    public function loginForm()
    {
        if(Auth::guard('web')->check())
        {
            return redirect()->route('home');
        }else
        {
            return view ('auth.cusLogin');
        }
    }

    public function login (Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
        ]);

        if(auth()->guard('web')->attempt([
            'nip' => $request->nip,
            'password' => $request->password,
        ]))
            {
                $users = auth()->user();
                return redirect()->intended(url('home'));
            } else
                {
                    return redirect()->back()->withError('Akun tidak terdaftar pada sistem');
                }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
