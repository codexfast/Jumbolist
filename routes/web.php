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
use Illuminate\Support\Facades\Redirect;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/logout', function (Request $request) {
        $request->session()->forget('admin_on');
        
        return redirect('/admin');
    });
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@check');

