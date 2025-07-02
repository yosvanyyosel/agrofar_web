<?php

use Illuminate\Support\Facades\Route;

// ===================
// RUTAS PÚBLICAS
// ===================

// Home y contactos
Route::view('/', 'welcome')->name('home');