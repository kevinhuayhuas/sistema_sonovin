<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DominioController;
use App\Mail\DominioVencido;
use App\Models\Dominio;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Creando  un grupo de rutas segun  modulo
Route::controller(DominioController::class)->group(function(){
    Route::get('dominios','index');
    Route::get('dominios/create','create');
    Route::get('dominios/{dominio}','show');
});


//Probar el envio de correo 
Route::get('/dominiovencido', function () {
    $dominio = new Dominio();
    return new dominiovencido($dominio);
    /*$response = Mail::to("forzaken.mg@hotmail.com")->send(new dominiovencido($dominio));*/
    //dump($response);
});
