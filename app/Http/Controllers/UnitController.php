<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    public function admin_create(Request $request)
    {
        $request->validate([
            'stateSelected' => 'required',
            'citySelected' => 'required',
            'unit' => 'required|min:1',
            'fileList' => 'required|mimes:pdf,jpg,png,jpeg|max:10000'
        ]);

        $state = $request->input('stateSelected');
        $city = $request->input('citySelected');
        $unity = $request->input('unit');
        $file = null;

        if (!is_null($request->fileList))
        {
            $file = time().'-list.'.$request->fileList->extension(); 
            $request->fileList->move(public_path('files'), $file);
        }

        Unit::create([
            'unit' => $unity,
            'initials' => $state,
            'city' => $city,
            'list' => $file,
            'pendent' => false
        ]);
    
        return redirect('/admin')->with('success', 'Unidade criada!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Unit::where('id', $request->input('id'))->delete();

        return redirect('/admin')->with('success', 'Apagado com sucesso!');
    }

    public function active(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $unit = Unit::where('id', $request->input('id'))->get()->first();
        $unit->pendent = false;

        $unit->save();

        return redirect('/admin')->with('success', 'Aceito com sucesso!');

    }
}
