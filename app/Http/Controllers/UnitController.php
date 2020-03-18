<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Notify;
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

        $customers = Customers::where('city', $city)->where('state', $state)->get();

        foreach($customers as $customer)
        {
            Notify::create([
                'customer_id' => $customer->id,
                'pendent' => true,
            ]);
        }

        return redirect('/admin')->with('success', 'Unidade criada!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $unit = Unit::where('id', $request->input('id'))->get()->first();
        unlink(public_path('files/'. $unit->list));
        $unit->delete();

        // Unit::where('id', $request->input('id'))->delete();

        return redirect('/admin')->with('success', 'Apagado com sucesso!');
    }

    public function active(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'unit_name' => 'required'
        ]);

        $unit = Unit::where('id', $request->input('id'))->get()->first();
        $unit->pendent = false;
        $unit->unit = $request->input('unit_name');

        $unit->save();

        $customers = Customers::where('city', $unit->city)->where('state', $unit->initials)->get();

        foreach($customers as $customer)
        {
            Notify::create([
                'customer_id' => $customer->id,
                'pendent' => true,
            ]);
        }

        return redirect('/admin')->with('success', 'Aceito com sucesso!');

    }

    public function client_create(Request $request)
    {

        
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'unit' => 'required|min:1',
            'fileList' => 'required|mimes:pdf,jpg,png,jpeg|max:10000'
        ]);
        
        $state = $request->input('state');
        $city = $request->input('city');
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
            'pendent' => true
        ]);
    
        return redirect('/buscar')->with('success', 'Unidade criada!');
    }
}
