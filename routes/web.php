<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::put('/admin/password', 'AdminController@password');
    Route::put('/admin/profile', 'AdminController@profile');

    Route::delete('/admin/donate/{id}', 'DonateController@delete')->where(['id' => '[0-9]+']);
    Route::post('/admin/donate', 'DonateController@create');

    Route::post('/admin/unit', 'UnitController@admin_create');
    Route::delete('/admin/unit', 'UnitController@delete');
    Route::put('/admin/unit', 'UnitController@active');

    Route::get('/admin/logout', function (Request $request) {
        $request->session()->forget('admin_on');
        
        return redirect('/admin');
    });

    Route::get('/update/states-cities', function (Request $request) {

        try {
            
            $resource = file_get_contents('https://gist.githubusercontent.com/letanure/3012978/raw/2e43be5f86eef95b915c1c804ccc86dc9790a50a/estados-cidades.json');
    
            Storage::put('estados-cidades.json', $resource);
    
            return redirect('/admin/settings')->with('success', 'Estados e cidades atualizados');
        } catch (\Throwable $th) {
            return redirect('/admin/settings')->with('danger', 'Não foi possivel atualizar cidades e estados');

        }
    });
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@check');

Route::get('/', 'HomeController@index');
Route::get('/thanks', 'HomeController@thanks');
Route::get('/buscar', 'HomeController@find');
Route::get('/sobre', 'HomeController@about');
Route::get('/doacoes', 'HomeController@donates');

