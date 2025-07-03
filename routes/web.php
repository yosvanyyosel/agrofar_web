<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AreaController, TrabajadorController, LaborController, HabilidadesTrabajadorController,
    MaquinariaController, MantenimientoMaquinariaController, ProduccionController, QuimicoController,
    TareaController, UsoMaquinariaController, UsoQuimicoController, ResultadoProduccionController,
    VacacionesLicenciasController
};
use App\Http\Controllers\Auth\LoginController;

Route::get('/', fn() => view('welcome'));

// Login personalizado
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registro personalizado
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Admin: acceso total (puede acceder a todo)
Route::middleware(['auth', 'role:admin_user'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resources([
        'areas' => AreaController::class,
        'trabajadores' => TrabajadorController::class,
        'labors' => LaborController::class,
        'habilidades-trabajadores' => HabilidadesTrabajadorController::class,
        'maquinarias' => MaquinariaController::class,
        'mantenimiento-maquinarias' => MantenimientoMaquinariaController::class,
        'producciones' => ProduccionController::class,
        'quimicos' => QuimicoController::class,
        'tareas' => TareaController::class,
        'uso-maquinarias' => UsoMaquinariaController::class,
        'uso-quimicos' => UsoQuimicoController::class,
        'resultados-produccion' => ResultadoProduccionController::class,
        'vacaciones-licencias' => VacacionesLicenciasController::class,
    ]);
});

// Analista: solo producción y resultados (admin también accede)
Route::middleware(['auth', 'role:analista_user,admin_user'])->group(function () {
    Route::resource('producciones', ProduccionController::class)->except('destroy');
    Route::resource('resultados-produccion', ResultadoProduccionController::class)->except('destroy');
});

// Insumos: solo insumos y maquinaria (admin también accede)
Route::middleware(['auth', 'role:insumos_user,admin_user'])->group(function () {
    Route::resource('quimicos', QuimicoController::class)->except('destroy');
    Route::resource('uso-quimicos', UsoQuimicoController::class)->except('destroy');
    Route::resource('maquinarias', MaquinariaController::class)->except('destroy');
    Route::resource('mantenimiento-maquinarias', MantenimientoMaquinariaController::class)->except('destroy');
    Route::resource('uso-maquinarias', UsoMaquinariaController::class)->except('destroy');
});

// Personal: solo personal y tareas (admin también accede)
Route::middleware(['auth', 'role:personal_user,admin_user'])->group(function () {
    Route::resource('trabajadores', TrabajadorController::class)->except('destroy');
    Route::resource('tareas', TareaController::class)->except('destroy');
    Route::resource('habilidades-trabajadores', HabilidadesTrabajadorController::class)->except('destroy');
    Route::resource('vacaciones-licencias', VacacionesLicenciasController::class)->except('destroy');
});
