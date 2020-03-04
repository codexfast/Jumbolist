<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Donate;
use App\Unit;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        return view('index', [
            'donates' => Donate::all(),
            'states_cities_with_unit' => json_encode(Unit::all()),
            'states_cities' => Storage::get('estados-cidades.json')

        ]);
    }

    public function thanks()
    {
        return view('thanks');
    }
}
