<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\LoQuieroController;
use Illuminate\Support\Facades\Artisan;


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

// ruta post para obtener_membresia
Route::post('/obtener_membresia', MembresiaController::class)->name('obtener_membresia');



/*
talleres
*/
Route::get('/talleres', TalleresController::class)->name('talleres');



/* 
ruta post para inscripcion a un evento o taller
*/
Route::post('/inscripcion', InscripcionController::class)->name('inscripcion');



/*
agenda
*/
Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');


/*
tienda
*/
/*Route::get('/tienda', function () {
    return view('tienda');
})->name('tienda');*/


/*
tienda
*/
Route::resource('tienda', ProductoController::class);
/*Route::get('/blog', function () {
    return view('blog');
})->name('blog');*/


/* 
ruta post para obtener un producto
*/
Route::post('/lo_quiero', LoQuieroController::class)->name('lo_quiero');


/*
blog
*/
Route::resource('blog', PostController::class);
/*Route::get('/blog', function () {
    return view('blog');
})->name('blog');*/


/*
perfil
*/
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');


/*
eventos
*/
Route::resource('eventos', EventoController::class);
//
/*Route::controller(EventoController::class)->group(function () {
    Route::get('eventos', 'index')->name('eventos.index');
    //Route::get('eventos/create', 'create')->name('eventos.create');
    //Route::post('eventos', 'store')->name('eventos.store');
    Route::get('eventos/{evento}', 'show')->name('eventos.show');
    //Route::get('eventos/{evento}/edit', 'edit')->name('eventos.edit');
    //Route::put('eventos/{evento}', 'update')->name('eventos.update');
    //Route::delete('eventos/{evento}', 'destroy')->name('eventos.destroy');
});*/



// Ruta para ejecutar comandos artisan desde la web
// se debe desactivar esta ruta despues del desarrollo
Route::get('/artisan/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
    //return Artisan::output();
});

// Ruta para ejecutar el comando que resuelve el problema del enjace simbolico
// php artisan storage:link
// se debe desactivar esta ruta despues del desarrollo
Route::get('/storage_link', function () {
    //Artisan::call('storage:link');
    //dd(Artisan::output());
    symlink('/home/u520718481/domains/casaraiz.uy/casaraiz/storage/app/public', '/home/u520718481/domains/casaraiz.uy/public_html/storage');
    return view('casa_raiz');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
