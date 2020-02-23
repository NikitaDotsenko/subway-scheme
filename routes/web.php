<?php

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
 * Entry point
 */

use App\Http\Controllers\DataController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);
/*
 * Station's routes
 */
Route::resource('/station', StationController::class);
/*
 * Stations data
 */
Route::resource('/data', DataController::class);
