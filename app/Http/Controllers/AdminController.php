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
use App\Banner;
use App\Metrics;
use App\Customers;

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

    public function users(Request $request) 
    {
        return view('users', [
            'admin' => Admin::first(),
            'users' => Customers::all(),
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
        $request->validate([
            'about_title' => 'required',
            'about_text' => 'required',
        ]);

        $AboutPage = AboutPage::first();
        $AboutPage->title = $request->input('about_title');
        $AboutPage->large_text = $request->input('about_text');

        $AboutPage->save();

        return redirect('/admin/settings')->with('success', "Pagina 'sobre' atualizado com sucesso");

    }

    public function update_platform(Request $request)
    {
        $request->validate([
            'embed' => 'required',
            'platform_name' => 'required',
            'smtp_server' => 'required',
            'smtp_user_server' => 'required',
            'smtp_pass_server' => 'required',
            'smtp_port_server' => 'required',
            'smtp_from' => 'required',
            'mail_encryption' => 'required'
        ]);

        $platform = Platform::first();
        $platform->app_name = $request->input('platform_name');
        $platform->iframe_youtube = $request->input('embed');
        
        $platform->SMTP_SERVER = $request->input('smtp_server');
        $platform->SMTP_USER_SERVER = $request->input('smtp_user_server');
        $platform->SMTP_PASS_SERVER = $request->input('smtp_pass_server');
        $platform->SMTP_PORT_SERVER = $request->input('smtp_port_server');
        $platform->SMTP_FROM = $request->input('smtp_from');
        $platform->MAIL_ENCRYPTION = $request->input('mail_encryption');

        $platform->save();

        return redirect('/admin/settings')->with('success', 'Plataforma atualizado com sucesso');

    }

    public function banners()
    {
        return view('banners', [
            'banners' => Banner::all(),
            'admin' => Admin::first(),

        ]);
    }

    public function add_banner(Request $request)
    {
        $request->validate([
            'banner' => 'required|mimes:jpg,png,jpeg|max:10000'
        ]);

        $file = null;

        if (!is_null($request->banner))
        {
            $file = time().'.'.$request->banner->extension(); 
            $request->banner->move(public_path('banners'), $file);
        }

        Banner::create([
            'banner' => $file
        ]);

        return redirect('/admin/banners')->with('success', 'Banner adicionado!');
    }

    public function remove_banner(Request $request)
    {
        $id = $request->id;

        $banner = Banner::where('id', $id)->get()->first();
        unlink(public_path('banners/'. $banner->banner));

        $banner->delete();
        
        return redirect('/admin/banners')->with('warning', 'Banner deletado!');
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
