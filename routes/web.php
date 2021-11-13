<?php

use App\Http\Controllers\AmethystAdminCore;
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

use App\Http\Controllers\AmethystCoreController;

Route::get('/', [AmethystCoreController::class, 'index']);

Route::get('home', [AmethystCoreController::class, 'home_view']);

Route::get('manager', [AmethystCoreController::class, 'manager_view']);

Route::get('create', [AmethystCoreController::class, 'create_view']);

Route::post('create/save', [AmethystCoreController::class, 'preg_create']);

/* ====================================================================== */

Route::get('config',[AmethystAdminCore::class, 'index']);
