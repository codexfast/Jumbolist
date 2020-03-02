<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donate;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard');
    }

    public function settings(Request $request)
    {
        
        return view('settings', [
            'donates' => Donate::all()
            
        ]);
    }
}
