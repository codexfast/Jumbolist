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

use App\Customers;
use App\Mail\NotifyCustomer;
use App\Notify;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;



Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/users', 'AdminController@users');
    Route::delete('/admin/users/{id}/remove', 'AdminController@remove_user')->where(['id' => '[0-9]+']);;
    Route::get('/admin/settings', 'AdminController@settings');
    Route::put('/admin/password', 'AdminController@password');
    Route::put('/admin/profile', 'AdminController@profile');

    Route::delete('/admin/donate/{id}', 'DonateController@delete')->where(['id' => '[0-9]+']);
    Route::post('/admin/donate', 'DonateController@create');

    Route::post('/admin/unit', 'UnitController@admin_create');
    Route::delete('/admin/unit', 'UnitController@delete');
    Route::put('/admin/unit', 'UnitController@active');

    Route::put('/admin/update_about_page', 'AdminController@update_about_page');
    Route::put('/admin/update_platform', 'AdminController@update_platform');

    Route::get('/admin/banners', 'AdminController@banners');
    Route::post('/admin/add-banner', 'AdminController@add_banner');
    Route::get('/admin/remove-banner/{id}', 'AdminController@remove_banner')->where(['id'=> '[0-9]+']);


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

    Route::get('/admin/notify-now', function (Request $response) {
        $all_pendent = Notify::where('pendent', true)->get();

        foreach($all_pendent as $pendent)
        {
            $customer = Customers::where('id', $pendent->customer_id)->get()->first();

            Mail::to($customer->email)->send(new NotifyCustomer($customer->city, $customer->state));

            $pendent->pendent = false;
            $pendent->save();
        }

        return redirect('/admin/settings')->with('success', 'Operação efetuada!');
    });
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@check');

Route::get('/', 'HomeController@index');
Route::get('/thanks', 'HomeController@thanks');
Route::get('/buscar', 'HomeController@find');
Route::get('/contribuir', 'HomeController@help');
Route::get('/sobre', 'HomeController@about');
Route::get('/doacoes', 'HomeController@donates');
Route::post('/unit', 'UnitController@client_create');
Route::post('/noty-user', 'HomeController@noty_user');
Route::get('/iframe', function (Request $request) {
    return view('iframe', [
        'states_cities_with_unit' => json_encode(Unit::where('pendent', false)->get()),
        'states_cities' => Storage::get('estados-cidades.json')
    ]);
    
});

// Test

Route::get("/test-grid", function (Request $request) {
    return view('test.index',[
        'states_cities_with_unit' => json_encode(Unit::where('pendent', false)->get()),
        'states_cities' => Storage::get('estados-cidades.json')
    ]);
});