<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsuariosController;


Route::get('', [HomeController::class, 'index'])->name('admin.home')->middleware('administrador');

//Route::get('usuarios', [UsuariosController::class, 'index'])->name('admin.usuarios')->middleware('administrador');
/*Route::controller(UsuariosController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index');
    Route::get('usuarios/create', 'create')->name('usuarios.create')->middleware('administrador');
    Route::post('usuarios', 'store')->name('usuarios.store')->middleware('administrador');
    Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
    Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit')->middleware('administrador');
    Route::put('usuarios/{usuario}', 'update')->name('usuarios.update')->middleware('administrador');
    Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy')->middleware('administrador');
});*/