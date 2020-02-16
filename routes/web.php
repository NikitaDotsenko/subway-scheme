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

use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
 * Entry point
 */
Route::get('/', IndexController::class);
/*
 * Station's routes
 */
Route::resource('/station', StationController::class);
/*
 * Stations data
 */
Route::get('/data', 'DataController@index');
