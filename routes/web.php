<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\LoQuieroController;
use App\Http\Controllers\Admin\UsuariosController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
Route::get('/agenda', AgendaController::class)->name('agenda');


/*
tienda
*/
/*Route::get('/tienda', function () {
    return view('tienda');
})->name('tienda');*/
//Route::resource('tienda', ProductoController::class);
Route::controller(ProductoController::class)->group(function () {
    Route::get('tienda', 'index')->name('tienda.index');
    Route::get('tienda/create', 'create')->name('tienda.create')->middleware('administrador');
    Route::post('tienda', 'store')->name('tienda.store')->middleware('administrador');
    Route::get('tienda/{tienda}', 'show')->name('tienda.show');
    Route::get('tienda/{tienda}/edit', 'edit')->name('tienda.edit')->middleware('administrador');
    Route::put('tienda/{tienda}', 'update')->name('tienda.update')->middleware('administrador');
    Route::delete('tienda/{tienda}', 'destroy')->name('tienda.destroy')->middleware('administrador');
});


/* 
ruta post para obtener un producto
*/
Route::post('/lo_quiero', LoQuieroController::class)->name('lo_quiero');


/*
blog
*/
//Route::resource('blog', PostController::class);
Route::controller(PostController::class)->group(function () {
    Route::get('blog', 'index')->name('blog.index');
    Route::get('blog/create', 'create')->name('blog.create')->middleware('colaborador');
    Route::post('blog', 'store')->name('blog.store')->middleware('colaborador');
    Route::get('blog/{blog}', 'show')->name('blog.show');
    Route::get('blog/{blog}/edit', 'edit')->name('blog.edit')->middleware('colaborador');
    Route::put('blog/{blog}', 'update')->name('blog.update')->middleware('colaborador');
    Route::delete('blog/{blog}', 'destroy')->name('blog.destroy')->middleware('colaborador');
});


/*
perfil
*/
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');


/*
eventos
*/
//Route::resource('eventos', EventoController::class);
//
Route::controller(EventoController::class)->group(function () {
    Route::get('eventos', 'index')->name('eventos.index')->middleware('administrador');
    Route::get('eventos/create', 'create')->name('eventos.create')->middleware('administrador');
    Route::post('eventos', 'store')->name('eventos.store')->middleware('administrador');
    Route::get('eventos/{evento}', 'show')->name('eventos.show');
    Route::get('eventos/{evento}/edit', 'edit')->name('eventos.edit')->middleware('administrador');
    Route::put('eventos/{evento}', 'update')->name('eventos.update')->middleware('administrador');
    Route::delete('eventos/{evento}', 'destroy')->name('eventos.destroy')->middleware('administrador');
});




/*
usuarios
*/
//Route::resource('usuarios', UsuariosController::class);
//
Route::controller(UsuariosController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index')->middleware('administrador');
    //Route::get('usuarios/create', 'create')->name('usuarios.create')->middleware('administrador');
    //Route::post('usuarios', 'store')->name('usuarios.store')->middleware('administrador');
    //Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
    Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit')->middleware('administrador');
    Route::put('usuarios/{usuario}', 'update')->name('usuarios.update')->middleware('administrador');
    //Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy')->middleware('administrador');
});




// Ruta para ejecutar comandos artisan desde la web
// se debe desactivar esta ruta despues del desarrollo
/*Route::get('/artisan/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
    //return Artisan::output();
});*/

// Ruta para ejecutar el comando que resuelve el problema del enjace simbolico
// php artisan storage:link
// se debe desactivar esta ruta despues del desarrollo
/*Route::get('/storage_link', function () {
    //Artisan::call('storage:link');
    //dd(Artisan::output());
    symlink('/home/u520718481/domains/casaraiz.uy/casaraiz/storage/app/public', '/home/u520718481/domains/casaraiz.uy/public_html/storage');
    return view('casa_raiz');
});*/



/*
CERRAR SESIÓN
*/
Route::get('/carrar_sesion', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('carrar_sesion');


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');*/

require __DIR__.'/auth.php';
