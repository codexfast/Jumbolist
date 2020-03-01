<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function check(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::where('email', $email)->first();

        if (!is_null($admin))
        {
            if (Hash::check($password, $admin->password))
            {
                $request->session()->put('admin_on', true);
                return redirect('/admin');
            }
        }

        return view('login', ['loginerr' => 'E-mail ou senha incorretos']);
    }
}
