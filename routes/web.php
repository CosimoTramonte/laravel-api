<?php

use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [DashbordController::class, 'index'])->name('home');
        Route::resource('projects', ProjectController::class);
        Route::get('kind-projects', [ProjectController::class, 'kindProjects'])->name('kindProjects');
        Route::get('technology-projects', [ProjectController::class, 'technologyProjects'])->name('technologyProjects');
    });

require __DIR__.'/auth.php';
