<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;

// ===================
// RUTAS PÚBLICAS
// ===================

// Home y contactos
Route::view('/', 'welcome')->name('home');
Route::view('/contactos', 'contactos')->name('contactos');

// Servir archivos JSON desde la raíz (excepto package/composer)
Route::get('/{file}.json', function ($file) {
    if (preg_match('/^(package|composer)/i', $file)) abort(404);
    $path = base_path("{$file}.json");
    if (!File::exists($path)) abort(404);
    return Response::file($path, ['Content-Type' => 'application/json']);
})->where('file', '[^\/]+');

// Tienda pública
Route::prefix('tienda')->group(function () {
    Route::get('/', [AppController::class, 'index'])->name('tienda.index');
    Route::get('/{app}', [AppController::class, 'show'])->name('tienda.show');
});

// Blog público
Route::prefix('blog')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('blog.index');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('blog.show');
});

// ===================
// SITEMAP PÚBLICO
// ===================
Route::get('/sitemap', function () {
    // Rutas públicas a incluir
    $routes = [
        route('home'),
        route('contactos'),
        route('tienda.index'),
        route('blog.index'),
    ];
  // Apps públicas
  foreach (\App\Models\App::allApps() as $app) {
    $routes[] = route('tienda.show', $app->slug);
}

// Artículos públicos
foreach (\App\Models\Article::publicArticles() as $article) {
    $routes[] = route('blog.show', $article->slug);
}

    // Formato XML para SEO
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($routes as $url) {
        $xml .= '<url><loc>' . htmlspecialchars($url) . '</loc></url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

// ===================
// RUTAS PROTEGIDAS (auth + verified)
// ===================
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('apps/{app}/download/{version}', [AppController::class, 'download'])->name('apps.download');

    // Tienda admin
    Route::prefix('tienda/admin')->middleware('admin')->group(function () {
        Route::get('/create', [AppController::class, 'create'])->name('tienda.create');
        Route::post('/', [AppController::class, 'store'])->name('tienda.store');
        Route::get('/{app}/edit', [AppController::class, 'edit'])->name('tienda.edit');
        Route::put('/{app}', [AppController::class, 'update'])->name('tienda.update');
        Route::delete('/{app}', [AppController::class, 'destroy'])->name('tienda.destroy');
        Route::delete('screenshots/{screenshot}', [AppController::class, 'destroyScreenshot'])->name('screenshot.destroy');
        Route::delete('versions/{version}', [AppController::class, 'destroyVersion'])->name('version.destroy');
    });

    // Blog admin
    Route::prefix('blog/admin')->middleware('admin')->group(function () {
        Route::get('/create', [ArticleController::class, 'create'])->name('blog.create');
        Route::post('/', [ArticleController::class, 'store'])->name('blog.store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('blog.edit');
        Route::put('/{article}', [ArticleController::class, 'update'])->name('blog.update');
        Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('blog.destroy');
    });
});
