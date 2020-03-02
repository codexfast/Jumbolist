<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Donate;
use App\Admin;


class AdminController extends Controller
{
    function __construct ()
    {
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            $current_password = Admin::first()->password;

            return Hash::check($value, $current_password) ? true : $validator->errors()->add('Senha incorreta', 'Senha atual inserida errada!');
        });
    }

    public function index(Request $request)
    {
        return view('dashboard', [
            'admin' => Admin::first()

        ]);
    }

    public function profile(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
            'name' => 'required|max:90',
            'email' => 'required|email',
        ]);

        $admin = Admin::first();
        $admin->email = $request->input('email');
        $admin->name = $request->input('name');

        $admin->save();

        return redirect('/admin/settings')->with('success', 'Usuário atualizado com sucesso');

    }

    public function password(Request $request)
    {

        $request->validate([
            'old_password' => 'required|min:4|current_password',
            'new_password' => 'required|min:4|confirmed',
        ]);

        $admin = Admin::first();
        $admin->password = Hash::make($request->input('new_password'));
        
        $admin->save();

        $request->session()->forget('admin_on');


        return redirect('/admin/settings')->with('success', 'Senha alterada');
    }

    public function settings(Request $request)
    {
        
        return view('settings', [
            'donates' => Donate::all(),
            'admin' => Admin::first()
        ]);
    }
}
