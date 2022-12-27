<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DominioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\PagoController;
use App\Mail\DominioVencido;
use App\Mail\DominioSuspendido;
use App\Mail\MailPagosDeServicios;
use App\Models\Dominio;
use App\Models\Cronograma;
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

//Creando  un grupo de rutas segun  modulo
Route::controller(ClienteController::class)->group(function(){
    Route::get('clientes','index');
    Route::get('clientes/create','create');
    Route::get('clientes/{cliente}','show');
});

//Creando  un grupo de rutas segun  modulo
Route::controller(ProductoController::class)->group(function(){
    Route::get('productos','index');
    Route::get('productos/create','create');
    Route::get('productos/{producto}','show');
    Route::post('guardarproducto','store');
});

//Creando  un grupo de rutas segun  modulo
Route::controller(CronogramaController::class)->group(function(){
    Route::get('cronogramas','index');
    Route::get('cronogramas/create','create');
    Route::get('cronogramas/{cronograma}','show');
});

//Creando  un grupo de rutas segun  modulo
Route::controller(PagoController::class)->group(function(){
    Route::get('pagos','index')->name('pagos');//vista all
    Route::get('pagos/create','create');// vista
    Route::get('pagos/{pago}','show');// vista mostrar find
    Route::get('editpago/{pago}','edit');// vista mostrar find
    Route::post('pagos','store'); // crear
    Route::put('pagos/{pago}','update'); //actualizar
    Route::get('eliminarpago/{id}','destroy'); // eliminar
});


Route::get('/dominiosuspendido', function () {
    $dominio = new Dominio();
    $dominio->nombre="kevinhuayhuas.com";
    return new DominioSuspendido($dominio);
    /*$response = Mail::to("forzaken.mg@hotmail.com")->send(new DominioSuspendido($dominio));*/
    //dump($response);
});
