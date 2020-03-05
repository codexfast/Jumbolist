<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Donate;
use App\Admin;
use App\Unit;
use App\Platform;
use App\AboutPage;
use App\Metrics;

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

        $units = Unit::where('pendent', false)->get();
        $units_pendent = Unit::where('pendent', true)->get();
         
        return view('dashboard', [
            'admin' => Admin::first(),
            'states_cities' => Storage::get('estados-cidades.json'),
            'units' => $units,
            'units_length' => count($units),
            'request_length' => count($units_pendent),
            'units_pendent' => $units_pendent,
            'metric_view' => Metrics::first()->views

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

    public function update_about_page(Request $request)
    {
        # code...
    }

    public function update_platform(Request $request)
    {
        # code...
    }

    public function settings(Request $request)
    {
        
        return view('settings', [
            'donates' => Donate::all(),
            'admin' => Admin::first(),
            'platform' => Platform::first(),
            'about_title' => AboutPage::first()->title,
            'about_text' => AboutPage::first()->large_text,
        ]);
    }
}
