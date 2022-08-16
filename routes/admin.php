<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::get('usuarios', [HomeController::class, 'usuarios'])->name('admin.usuarios');