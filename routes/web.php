<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\LoQuieroController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\CasaRaizController;
use App\Http\Controllers\PropuestaController;
use App\Http\Controllers\ComunidadRaizController;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Acá se definen la mayoría de las rutas a las que el backend responde.
| En el archivo auth.php se definen algunas rutas mas que corresponden al 
| sistema (LaravelBreeze) de registro, login, restauración de contraseñas, etc. 
|
*/




/*
|--------------------------------------------------------------------------
| home
|--------------------------------------------------------------------------
| El método __invoke() de la clase HomeController.php 
| se encarga de devolver la vista del home.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los datos del $banner.
*/
Route::get('/', HomeController::class)->name('home');




/*
|--------------------------------------------------------------------------
| casa_raiz
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/casa_raiz', CasaRaizController::class)->name('casa_raiz');
/*Route::get('/casa_raiz', function () {
    return view('casa_raiz');
})->name('casa_raiz');*/




/*
|--------------------------------------------------------------------------
| comunidad
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/comunidad', ComunidadRaizController::class)->name('comunidad_raiz');
/*Route::get('/comunidad', function () {
    return view('comunidad_raiz');
})->name('comunidad_raiz');*/




/* 
|--------------------------------------------------------------------------
| obtener_membresia 
|--------------------------------------------------------------------------
| Esta ruta no devuelve una vista. Utiliza un controlador para recibir y 
| gestionar los formularios para solicitar membresías.
*/
Route::post('/obtener_membresia', MembresiaController::class)->name('obtener_membresia');




/* 
|--------------------------------------------------------------------------
| propuesta 
|--------------------------------------------------------------------------
| Esta ruta no devuelve una vista. Utiliza un controlador para recibir y 
| gestionar los formularios de propuestas.
*/
Route::controller(PropuestaController::class)->group(function () {
    Route::get('propuestas', 'index')->name('propuestas.index')->middleware('administrador');
    //Route::get('propuestas/create', 'create')->name('propuestas.create')->middleware('administrador');
    Route::post('propuestas', 'store')->name('propuestas.store');
    //Route::get('propuestas/{propuesta}', 'show')->name('propuestas.show')->middleware('administrador');
    Route::get('propuestas/{propuesta}/edit', 'edit')->name('propuestas.edit')->middleware('administrador');
    Route::put('propuestas/{propuesta}', 'update')->name('propuestas.update')->middleware('administrador');
    Route::delete('propuestas/{propuesta}', 'destroy')->name('propuestas.destroy')->middleware('administrador');
});




/*
|--------------------------------------------------------------------------
| talleres
|--------------------------------------------------------------------------
| El método __invoke() de la clase TalleresController.php 
| se encarga de devolver la vista de talleres.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los datos del $talleres.
*/
Route::get('/talleres', TalleresController::class)->name('talleres');




/* 
|--------------------------------------------------------------------------
| inscripcion
|--------------------------------------------------------------------------
| Esta ruta no devuelve una vista. Utiliza un controlador para recibir y 
| gestionar los formularios de inscripción a un evento.
*/
//Route::post('/inscripcion', InscripcionController::class)->name('inscripcion');




/*
|--------------------------------------------------------------------------
| agenda
|--------------------------------------------------------------------------
| El método __invoke() de la clase AgendaController.php 
| se encarga de devolver la vista de agenda.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los datos de eventos y banner.
*/
Route::get('/agenda', AgendaController::class)->name('agenda');




/* 
|--------------------------------------------------------------------------
| tienda
|--------------------------------------------------------------------------
| El método __invoke() de la clase TiendaController.php 
| se encarga de devolver la vista de tienda.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los datos de productos, almacen_de_semillas, 
| biblioteca y ludoteca.
*/
Route::get('/tienda', TiendaController::class)->name('tienda');




/*
|--------------------------------------------------------------------------
| productos
|--------------------------------------------------------------------------
| La ruta de productos es administrada por el controlador 
| ProductoController, ya que debe cumplir con la funciones 
| de CRUD para productos. 
*/
Route::controller(ProductoController::class)->group(function () {
    Route::get('productos', 'index')->name('productos.index')->middleware('administrador');
    Route::get('productos/create', 'create')->name('productos.create')->middleware('administrador');
    Route::post('productos', 'store')->name('productos.store')->middleware('administrador');
    Route::get('productos/{producto}', 'show')->name('productos.show')->middleware('administrador');
    Route::get('productos/{producto}/edit', 'edit')->name('productos.edit')->middleware('administrador');
    Route::put('productos/{producto}', 'update')->name('productos.update')->middleware('administrador');
    Route::delete('productos/{producto}', 'destroy')->name('productos.destroy')->middleware('administrador');
});




/* 
|--------------------------------------------------------------------------
| lo_quiero
|--------------------------------------------------------------------------
| Esta ruta no devuelve una vista. Utiliza un controlador para recibir y 
| gestionar los formularios para obtener un producto.
*/
Route::post('/lo_quiero', LoQuieroController::class)->name('lo_quiero');




/*
|--------------------------------------------------------------------------
| blog
|--------------------------------------------------------------------------
| La ruta de blog es administrada por el controlador 
| PostController, ya que debe cumplir con la funciones 
| de CRUD para post. 
| Utiliza el middleware 'colaborador' que permite 
| que los usuarios con dicho rol creen y editen publicaciones del blog
*/
//Route::resource('blog', PostController::class);
Route::controller(PostController::class)->group(function () {
    Route::get('blog', 'index')->name('blog.index')->middleware('colaborador');
    Route::get('blog/create', 'create')->name('blog.create')->middleware('colaborador');
    Route::post('blog', 'store')->name('blog.store')->middleware('colaborador');
    Route::get('blog/{blog}', 'show')->name('blog.show')->middleware('colaborador');
    Route::get('blog/{blog}/edit', 'edit')->name('blog.edit')->middleware('colaborador');
    Route::put('blog/{blog}', 'update')->name('blog.update')->middleware('colaborador');
    Route::delete('blog/{blog}', 'destroy')->name('blog.destroy')->middleware('colaborador');
});




/*
|--------------------------------------------------------------------------
| eventos
|--------------------------------------------------------------------------
| La ruta de eventos es administrada por el controlador 
| EventoController, ya que debe cumplir con la funciones 
| de CRUD para eventos.
| Utiliza el middleware 'administrador' que permite 
| que los usuarios con dicho rol creen y editen eventos
*/
//Route::resource('eventos', EventoController::class);
Route::controller(EventoController::class)->group(function () {
    Route::get('eventos', 'index')->name('eventos.index')->middleware('administrador');
    Route::get('eventos/create', 'create')->name('eventos.create')->middleware('administrador');
    Route::post('eventos', 'store')->name('eventos.store')->middleware('administrador');
    //Route::get('eventos/{evento}', 'show')->name('eventos.show')->middleware('administrador');
    Route::get('eventos/{evento}/edit', 'edit')->name('eventos.edit')->middleware('administrador');
    Route::put('eventos/{evento}', 'update')->name('eventos.update')->middleware('administrador');
    Route::delete('eventos/{evento}', 'destroy')->name('eventos.destroy')->middleware('administrador');
});




/*
|--------------------------------------------------------------------------
| usuarios
|--------------------------------------------------------------------------
| La ruta de usuarios es administrada por el controlador 
| UsuariosController, ya que debe cumplir alguna funcion 
| del CRUD de usuarios.
| Utiliza el middleware 'administrador' que permite 
| que los usuarios con dicho rol puedan ver info y editar el rol de los usuarios.
*/
//Route::resource('usuarios', UsuariosController::class);
Route::controller(UsuariosController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index')->middleware('administrador');
    //Route::get('usuarios/create', 'create')->name('usuarios.create')->middleware('administrador');
    //Route::post('usuarios', 'store')->name('usuarios.store')->middleware('administrador');
    //Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
    Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit')->middleware('administrador');
    Route::put('usuarios/{usuario}', 'update')->name('usuarios.update')->middleware('administrador');
    //Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy')->middleware('administrador');
});




/*
|--------------------------------------------------------------------------
| mi_perfil
|--------------------------------------------------------------------------
| La ruta mi_perfil es administrada por el controlador 
| MiPerfilController, ya que debe cumplir con la funciones 
| de CRUD del propio usuario.
| Utiliza el middleware 'auth' que permite 
| que un usuario pueda editar sus datos.
*/
//Route::resource('usuarios', UsuariosController::class);
Route::controller(MiPerfilController::class)->group(function () {
    Route::get('mi_perfil', 'index')->name('mi_perfil')->middleware('auth');
    //Route::get('mi_perfil/create', 'create')->name('mi_perfil.create')->middleware('administrador');
    //Route::post('mi_perfil', 'store')->name('mi_perfil.store')->middleware('administrador');
    //Route::get('mi_perfil/{usuario}', 'show')->name('mi_perfil.show');
    //Route::get('mi_perfil/{usuario}/edit', 'edit')->name('mi_perfil.edit')->middleware('administrador');
    Route::put('mi_perfil/{usuario}', 'update')->name('mi_perfil.update')->middleware('auth');
    //Route::delete('mi_perfil/{usuario}', 'destroy')->name('mi_perfil.destroy')->middleware('administrador');
});




/*
|--------------------------------------------------------------------------
| banner
|--------------------------------------------------------------------------
| La ruta banner es administrada por el controlador 
| BannerController, ya que debe cumplir con la funciones 
| de CRUD para los elementos del banner de novedades.
| Utiliza el middleware 'administrador' que permite 
| que los usuarios con dicho rol creen y editen los elementos
*/
//Route::get('/', BannerController::class)->name('banner');
Route::controller(BannerController::class)->group(function () {
    Route::get('banner', 'index')->name('banner.index')->middleware('administrador');
    //Route::get('banner/create', 'create')->name('banner.create')->middleware('administrador');
    Route::post('banner', 'store')->name('banner.store')->middleware('administrador');
    //Route::get('banner/{imagen}', 'show')->name('banner.show');
    //Route::get('banner/{imagen}/edit', 'edit')->name('banner.edit')->middleware('administrador');
    Route::put('banner/{imagen}', 'update')->name('banner.update')->middleware('administrador');
    Route::delete('banner/{imagen}', 'destroy')->name('banner.destroy')->middleware('administrador');
});




/* 
|--------------------------------------------------------------------------
| inscripciones
|--------------------------------------------------------------------------
| La ruta inscripciones es administrada por el controlador 
| InscripcionesController, ya que debe cumplir con alguna de las  
| funciones de CRUD para las inscripciones.
| El index utiliza el middleware 'administrador' ya que muesrta un 
| listado de las inscripciones recibidas
| La ruta POST 'store' se utiliza para recibir y 
| gestionar los formularios de inscripción a un evento.
*/
//Route::get('/inscripciones', InscripcionesController::class)->name('inscripciones')->middleware('administrador');
Route::controller(InscripcionesController::class)->group(function () {
    Route::get('inscripciones', 'index')->name('inscripciones.index')->middleware('administrador');
    //Route::get('inscripciones/create', 'create')->name('inscripciones.create')->middleware('administrador');
    Route::post('inscripciones', 'store')->name('inscripciones.store');
    //Route::get('inscripciones/{imagen}', 'show')->name('inscripciones.show');
    //Route::get('inscripciones/{imagen}/edit', 'edit')->name('inscripciones.edit')->middleware('administrador');
    //Route::put('inscripciones/{imagen}', 'update')->name('inscripciones.update')->middleware('administrador');
    //Route::delete('inscripciones/{imagen}', 'destroy')->name('inscripciones.destroy')->middleware('administrador');
});




/* 
|--------------------------------------------------------------------------
| artisan
|--------------------------------------------------------------------------
| Esta ruta se usa para ejecutar comandos artisan desde la web,
| mayormente para ejecutar las migraciones en produccion
| En produccion se debe desactivar despues de usar
| La ruta para ejecutar las migraciones debe verse 
| asi -> https://www.casaraiz.uy/artisan/migrate
| o asi -> https://www.casaraiz.uy/artisan/list // para testear
| Como medida extra de seguridad, utiliza el middelware 'administrador'
*/
Route::get('/artisan/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
    //return Artisan::output();
})->middleware('administrador');




/* 
|--------------------------------------------------------------------------
| storage_link
|--------------------------------------------------------------------------
| Ruta para ejecutar el comando que resuelve el problema 
| del enjace simbolico (no encuentra las imagenes).
| En la consola se veria asi -> php artisan storage:link
| Puede matenerse desactivada ya que esta resuelto el problema
*/
/*Route::get('/storage_link', function () {
    //Artisan::call('storage:link');
    //dd(Artisan::output());
    symlink('/home/u520718481/domains/casaraiz.uy/casaraiz/storage/app/public', '/home/u520718481/domains/casaraiz.uy/public_html/storage');
    return view('casa_raiz');
});*/




/*
|--------------------------------------------------------------------------
| cerrar_sesion
|--------------------------------------------------------------------------
| Esta ruta no devuelve ninguna vista. 
| Simplemente, ejecuta las acciones para cerrar la sesión
*/
Route::get('/cerrar_sesion', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('cerrar_sesion');




/*
|--------------------------------------------------------------------------
| RUTAS DEL SISTEMA DE LOGIN Y REGISTRO (libreria LaravelBreeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
