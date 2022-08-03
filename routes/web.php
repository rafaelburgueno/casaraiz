<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


/*
home
*/
Route::get('/', HomeController::class)->name('home');


/*
casa_raiz
*/
Route::get('/casa_raiz', function () {
    return view('casa_raiz');
})->name('casa_raiz');


/*
comunidad_raiz
*/
Route::get('/comunidad_raiz', function () {
    return view('comunidad_raiz');
})->name('comunidad_raiz');


/*
talleres
*/
Route::get('/talleres', function () {
    return view('talleres');
})->name('talleres');


/*
agenda
*/
Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');


/*
tienda
*/
Route::get('/tienda', function () {
    return view('tienda');
})->name('tienda');


/*
blog
*/
Route::get('/blog', function () {
    return view('blog');
})->name('blog');


/*
perfil
*/
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
