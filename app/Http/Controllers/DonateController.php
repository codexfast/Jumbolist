<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donate;

class DonateController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->id;

        Donate::where('id', $id)->delete();

        return redirect('/admin/settings')->with('warning', 'Apagado com sucesso!');
    }

    public function create (Request $request)
    {

        $request->validate([
            'link' => 'required',
            'amount' => 'required|between:0,9999999.99',
        ]);

        Donate::create([
            'amount' => comma_for_point($request->input('amount')),
            'link' => $request->input('link')
        ]);
        
        return redirect('/admin/settings')->with('success', 'Criado com sucesso!');
    }
}
