<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Unit;
use App\Platform;
use App\AboutPage;
use App\Customers;
use App\Metrics;
use App\Notify;

class HomeController extends Controller
{

    function __construct () {
        $metric = Metrics::first();
        $metric->views += 1;
        $metric->save();
    }

    public function index(Request $request)
    {

        return view('home', [
            'embed_youtube' => Platform::first()->iframe_youtube,
        ]);
    }

    public function about(Request $request)
    {
        return view('about', [
            'about_title' => AboutPage::first()->title,
            'about_text' => AboutPage::first()->large_text,
        ]);
    }

    public function find(Request $request)
    {
        return view('find', [
            'states_cities_with_unit' => json_encode(Unit::where('pendent', false)->get()),
            'states_cities' => Storage::get('estados-cidades.json')
        ]);
    }

    public function donates()
    {
        return view('donates');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function noty_user(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'notySelectState' => 'required',
            'notySelectCity' => 'required',
        ]);

        $email = $request->input('email');

        Customers::create([
            'email' => $email,
            'state' => $request->input('notySelectState'),
            'city' => $request->input('notySelectCity'),
        ]);
    

        return redirect('/buscar')->with('success', "${email} casdatrado ocm sucesso");
    }
}
